import { Option } from '@ephox/katamari';
import { Element } from '@ephox/sugar';

import { Bounds } from '../../alien/Boxes';
import { SugarPosition, SugarEvent } from '../../alien/TypeDefinitions';
import * as Behaviour from '../../api/behaviour/Behaviour';
import { AlloyComponent } from '../../api/component/ComponentApi';
import { CoordAdt } from '../../api/data/DragCoord';
import { MouseDraggingConfigSpec } from '../mouse/MouseDraggingTypes';
import { TouchDraggingConfigSpec } from '../touch/TouchDraggingTypes';
import { BehaviourState } from '../../behaviour/common/BehaviourState';

export interface DraggingBehaviour extends Behaviour.AlloyBehaviour<DraggingConfigSpec, DraggingConfig> {
  config: (config: DraggingConfigSpec) => Behaviour.NamedConfiguredBehaviour<DraggingConfigSpec, DraggingConfig>;
  snap: (sConfig: SnapConfigSpec) => any;
}

export type DraggingMode = 'touch' | 'mouse';
export type SensorCoords = (x: number, y: number) => CoordAdt;
export type OutputCoords = (x: Option<number>, y: Option<number>) => CoordAdt;

export interface SnapConfig {
  sensor: () => CoordAdt;
  range: () => SugarPosition;
  output: () => CoordAdt;
  extra?: () => any;
}

export interface SnapConfigSpec {
  sensor: CoordAdt;
  range: SugarPosition;
  output: CoordAdt;
  extra?: any;
}

export interface SnapOutput {
  output: () => CoordAdt;
  extra: any;
}

export interface SnapPin {
  coord: CoordAdt;
  extra: any;
}

export interface SnapsConfig {
  getSnapPoints: (comp: AlloyComponent) => SnapConfig[];
  leftAttr: string;
  topAttr: string;
  onSensor?: (component: AlloyComponent, extra: {}) => void;
  lazyViewport?: (component: AlloyComponent) => Bounds;
}

export interface DraggingConfig {
  getTarget: (comp: Element) => Element;
  snaps: Option<SnapsConfig>;
  onDrop: (comp: AlloyComponent, Element) => void;
  repositionTarget: boolean;
  onDrag: (comp: AlloyComponent, target: Element, delta: SugarPosition) => void;
  getBounds: () => Bounds;
}

export interface CommonDraggingConfigSpec {
  useFixed?: boolean;
  onDrop?: (comp: AlloyComponent, target: Element) => void;
  repositionTarget?: boolean;
  onDrag?: (comp: AlloyComponent, target: Element, delta: SugarPosition) => void;
  getTarget?: (elem: Element) => Element;
  getBounds?: () => Bounds;
  snaps?: SnapsConfig;
}

export type DraggingConfigSpec = MouseDraggingConfigSpec | TouchDraggingConfigSpec;

export interface DragModeDeltas<T> {
  getData: (event: SugarEvent) => Option<T>;
  getDelta: (old: T, nu: T) => T;
}

export interface DragStartData {
  width: number;
  height: number;
  bounds: Bounds;
}

export interface DraggingState<T> extends BehaviourState {
  update: (mode: DragModeDeltas<T>, dragEvent: SugarEvent) => Option<T>;
  setStartData: (data: DragStartData) => void;
  getStartData: () => Option<DragStartData>;
  reset: () => void;
}
