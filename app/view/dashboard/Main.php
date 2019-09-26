<div class="row justify-content-center">
  <table class="table col-11">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nº da Sala</th>
      <th scope="col">08:00 as 09:00</th>
      <th scope="col">09:00 as 10:00</th>
      <th scope="col">10:00 as 11:00</th>
      <th scope="col">11:00 as 12:00</th>
      <th scope="col">14:00 as 15:00</th>
      <th scope="col">15:00 as 16:00</th>
      <th scope="col">16:00 as 17:00</th>
      <th scope="col">17:00 as 18:00</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($this->getRooms() as $key => $value): ?>
    <tr>
      <td><?=$value->roomNumber?></td>
      <td><?php $hour = '08:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '09:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '10:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '11:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '13:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '14:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '16:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
      <td><?php $hour = '17:00:00'; $this->checkReserve($this->getParameterDay(), $hour, $value->id); ?></td>
    </tr>
	<?php endforeach; ?>
  </tbody>
</table>
</div>