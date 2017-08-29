<?php
$numb = rand(1,6);
?>

<?php if($numb != $guess): ?> 
<h1>The number is <?= $numb ?>! </h1>
<?php if(isset($guess)): ?>
<h2>Your guess was <?= $guess ?> </h2>
<?php endif; else:  ?>
<h1> Nice! you guessed correct! : <?= $guess ?> </h1>
<?php endif; ?>
