<div class="sidebar">
    <div class="logo">
        TEAM TORTUE
    </div>
    <ul class="menu">

        <li>
            <a href="index.php" class="<?php echo  str_contains($_SERVER['REQUEST_URI'], 'index.php') ? 'active' : ''; ?>">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li>
            <a href="csv.php" class="<?php echo str_contains($_SERVER['REQUEST_URI'], 'csv.php') ?  'active' : ''; ?>">
                <i class="fa-solid fa-database" style="color: #1f5120;"></i>
                <span>Labo XML</span>
            </a>
        </li>
        
        
    </ul>
</div>