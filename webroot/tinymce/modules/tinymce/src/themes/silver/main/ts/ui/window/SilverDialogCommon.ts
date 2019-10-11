/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 */

import {
  AddEventsBehaviour,
  AlloyTriggers,
  Behaviour,
  DomFactory,
  GuiFactory,
  ModalDialog,
  Reflecting,
  SystemEvents,
  Focusing,
  AlloyEvents,
  NativeEvents,
  Keying,
  AlloyParts,
  AlloySpec,
} from '@ephox/alloy';
import { DialogManager, Types } from '@ephox/bridge';
import { Option, Arr, Cell } from '@ephox/katamari';
import { Body, Class } from '@ephox/sugar';
import { UiFactoryBackstage } from '../../backstage/Backstage';
import { RepresentingConfigs } from '../alien/RepresentingConfigs';
import { FormBlockEvent, formCancelEvent } from '../general/FormEvents';
import NavigableObject from '../general/NavigableObject';
import { dialogChannel } from './DialogChannels';
import { renderModalHeader } from './SilverDialogHeader';
import { StoragedMenuItem, StoragedMenuButton } from '../button/MenuButton';

export interface WindowExtra<T> {
  redial?: (newConfig: Types.Dialog.DialogApi<T>) => DialogManager.DialogInit<T>;
  closeWindow: () => void;
}

export interface DialogSpec {
  header: AlloySpec;
  body: AlloyParts.ConfiguredPart;
  footer: Option<AlloyParts.ConfiguredPart>;
  extraClasses: string[];
  extraStyles: Record<string, string>;
  extraBehaviours: Behaviour.NamedConfiguredBehaviour<any, any>[];
}

const getHeader = (title: string, backstage: UiFactoryBackstage) => {
  return renderModalHeader({
    title: backstage.shared.providers.translate(title),
    draggable: backstage.dialog.isDraggableModal()
  }, backstage.shared.providers);
};

const getEventExtras = (lazyDialog, extra: WindowExtra<any>) => {
  return {
    onClose: () => extra.closeWindow(),
    onBlock: (blockEvent: FormBlockEvent) => {
      ModalDialog.setBusy(lazyDialog(), (d, bs) => {
        return {
          dom: {
            tag: 'div',
            classes: [ 'tox-dialog__busy-spinner' ],
            attributes: {
              'aria-label': blockEvent.message()
            },
            styles: {
              left: '0px',
              right: '0px',
              bottom: '0px',
              top: '0px',
              position: 'absolute'
            }
          },
          behaviours: bs,
          components: [
            {
              dom: DomFactory.fromHtml(`<div class="tox-spinner"><div></div><div></div><div></div></div>`)
            }
          ]
        };
      });
    },
    onUnblock: () => {
      ModalDialog.setIdle(lazyDialog());
    }
  };
};

const renderModalDialog = (spec: DialogSpec, initialData, dialogEvents: AlloyEvents.AlloyEventKeyAndHandler<any>[], backstage: UiFactoryBackstage) => {
  const updateState = (_comp, incoming) => {
    return Option.some(incoming);
  };

  return GuiFactory.build(
    ModalDialog.sketch({
      lazySink: backstage.shared.getSink,
      // TODO: Disable while validating
      onEscape(c) {
        AlloyTriggers.emit(c, formCancelEvent);
        return Option.some(true);
      },

      useTabstopAt: (elem) => !NavigableObject.isPseudoStop(elem),

      modalBehaviours: Behaviour.derive([
        Reflecting.config({
          channel: dialogChannel,
          updateState,
          initialData
        }),
        RepresentingConfigs.memory({ }),
        Focusing.config({}),
        AddEventsBehaviour.config('execute-on-form', dialogEvents.concat([
          // Note: `runOnSource` here will only listen to the event at the outer component level.
          // Using just `run` instead will cause an infinite loop as `focusIn` would fire a `focusin` which would then get responded to and so forth.
          AlloyEvents.runOnSource(NativeEvents.focusin(), (comp, se) => {
            Keying.focusIn(comp);
          })
        ])),
        AddEventsBehaviour.config('scroll-lock', [
          AlloyEvents.runOnAttached(() => {
            Class.add(Body.body(), 'tox-dialog__disable-scroll');
          }),
          AlloyEvents.runOnDetached(() => {
            Class.remove(Body.body(), 'tox-dialog__disable-scroll');
          }),
        ]),
        ...spec.extraBehaviours
      ]),

      eventOrder: {
        [SystemEvents.execute()]: [ 'execute-on-form' ],
        [SystemEvents.receive()]: [ 'reflecting', 'receiving' ],
        [SystemEvents.attachedToDom()]: [ 'scroll-lock', 'reflecting', 'messages', 'execute-on-form', 'alloy.base.behaviour' ],
        [SystemEvents.detachedFromDom()]: [ 'alloy.base.behaviour', 'execute-on-form', 'messages', 'reflecting', 'scroll-lock' ],
      },

      dom: {
        tag: 'div',
        classes: [ 'tox-dialog' ].concat(spec.extraClasses),
        styles: {
          position: 'relative',
          ...spec.extraStyles
        }
      },
      components: [
        spec.header,
        spec.body,
        ...spec.footer.toArray()
      ],
      dragBlockClass: 'tox-dialog-wrap',
      parts: {
        blocker: {
          dom: DomFactory.fromHtml('<div class="tox-dialog-wrap"></div>'),
          components: [
            {
              dom: {
                tag: 'div',
                classes: [ 'tox-dialog-wrap__backdrop' ]
              }
            }
          ]
        }
      }
    })
  );
};

const mapMenuButtons = (buttons: Types.Dialog.DialogButton[]): (Types.Dialog.DialogButton | StoragedMenuButton)[] => {
  const mapItems = (button: Types.Dialog.DialogMenuButton): StoragedMenuButton => {
    const items = Arr.map(button.items, (item: Types.Dialog.DialogToggleMenuItem): StoragedMenuItem => {
      const cell = Cell<Boolean>(false);
      return {
        ...item,
        storage: cell
      };
    });
    return {
      ...button,
      items
    };
  };

  return Arr.map(buttons, (button: Types.Dialog.DialogMenuButton) => {
    if (button.type === 'menu') {
      return mapItems(button);
    }
    return button;
  });
};

const extractCellsToObject = (buttons: (StoragedMenuButton | Types.Dialog.DialogMenuButton | Types.Dialog.DialogNormalButton)[]) => {
  return Arr.foldl(buttons, (acc, button) => {
    if (button.type === 'menu') {
      const menuButton = button as StoragedMenuButton;
      return Arr.foldl(menuButton.items, (innerAcc, item) => {
        innerAcc[item.name] = item.storage;
        return innerAcc;
      }, acc);
    }
    return acc;
  }, {});
};

export {
  getHeader,
  getEventExtras,
  renderModalDialog,
  mapMenuButtons,
  extractCellsToObject
};
