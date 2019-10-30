<li>
    <a href="index.html">Dashboard 1</a>
</li>
<li>
    <a href="index2.html">Dashboard 2</a>
</li>
<li>
    <a href="index3.html">Dashboard 3</a>
</li>
<li>
    <a href="index4.html">Dashboard 4</a>
</li>
</ul>
</li>
<li>
    <a href="chart.html">
        <i class="fas fa-chart-bar"></i>Charts</a>
</li>
<li>
    <a href="table.html">
        <i class="fas fa-table"></i>Tables</a>
</li>
<li>
    <a href="form.html">
        <i class="far fa-check-square"></i>Forms</a>
</li>
<li>
    <a href="calendar.html">
        <i class="fas fa-calendar-alt"></i>Calendar</a>
</li>
<li>
    <a href="map.html">
        <i class="fas fa-map-marker-alt"></i>Maps</a>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-copy"></i>Pages</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="login.html">Login</a>
        </li>
        <li>
            <a href="register.html">Register</a>
        </li>
        <li>
            <a href="forget-pass.html">Forget Password</a>
        </li>
    </ul>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fa fa-group"></i>Users</a>
    <ul class="list-unstyled navbar__sub-list js-sub-list">
        <li>
            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'add']); ?>">Add New User</a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'index']); ?>">List Users</a>
        </li>