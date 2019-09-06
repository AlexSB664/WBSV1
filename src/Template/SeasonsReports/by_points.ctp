<table class="table">
  <thead>
    <!-- Headers -->
    <tr>
      <th>Participante</th>
      <?php foreach ($competitions as $header) : ?>
        <th scope="col"><?= $header->name ?></th>
      <?php endforeach ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?= $user->aka ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    <?php endforeach ?>
  </tbody>

</table>