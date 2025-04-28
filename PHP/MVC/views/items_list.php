<h1>Items List</h1>

<form>
    <label for="itemFilter">Filter: </label><input type="text" onkeyup="Filter(this.value)">
</form>

<ul id="demo">
    <?php foreach ($items as $item): ?>
        <li>
            <a href="/detail/?id=<?= $item['id']; ?>"><?= htmlspecialchars($item['name']); ?></a>
            <a href="/item/edit/?id=<?= $item['id']; ?>">Edit</a>
            <a href="/delete/?id=<?= $item['id']; ?>">Smazat</a>
        </li>
    <?php endforeach; ?>
</ul>
<a href="/add/">Add New Item</a>

<br><br>

<a href="/about/">O nás</a>

<script>

    function Filter(str) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            document.getElementById("demo").innerHTML = this.responseText;
        }
        xmlhttp.open("GET", "/?q=" + str);
        xmlhttp.send();
    }

</script>

