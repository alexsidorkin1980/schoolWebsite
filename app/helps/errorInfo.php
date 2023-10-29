<?php

// tt($errMsg);
if(count($errMsg) > 0){?>
<ul>
<?php foreach($errMsg as $err) { ?>

    <li><?=$err?></li>
<?php } ?>
</ul>
<?php } ?>