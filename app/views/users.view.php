<?php foreach ($users as $user): ?>
    <li><?=$user->Name;?></li>
<?php endforeach; ?>
<section id="content">
    <h1>Submit your data</h1>
    <form method="POST" action="index.php/users">
        <input name="name">
        <button type="submit"></button>
    </form>
</section>