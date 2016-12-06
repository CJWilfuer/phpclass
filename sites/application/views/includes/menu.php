<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        $dashboard

        <li
            <?php
            if(isset($dashboard)){
            echo " class='active'";
            }
            ?>
        >
            <a href="/sites/admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li
            <?php
            if(isset($manage_marathon)){
                echo " class='active'";
            }
            ?>
        >
            <a href="/sites/admin/manage_marathon/"><i class="fa fa-fw fa-wrench"></i>Manage Marathon</a>
        </li>
        <li

            <?php
            if(isset($add_marathons)){
                echo " class='active'";
            }
            ?>
        >
            <a href="/sites/admin/add_marathons/"><i class="fa fa-fw fa-edit"></i> add Marathons</a>
        </li>
        <li
            <?php
            if(isset($manage_runners)){
                echo " class='active'";
            }
            ?>
        >
            <a href="/sites/admin/manage_runners/"><i class="fa fa-fw fa-wrench"></i>Manage Runners</a>
        </li>

        <li
            <?php
            if(isset($registration_form)){
                echo " class='active'";
            }
            ?>
        >
            <a href="/sites/admin/registration_form/"><i class="fa fa-fw fa-file"></i> Registration form</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->