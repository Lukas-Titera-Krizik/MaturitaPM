<h1>Edit Item</h1>
<form action="/item/edit/?id=<?= $_GET['id']; ?>" method="post">
    <label for="itemName">New Name:</label>
    <input type="text" id="itemName" name="itemName">
    <button type="submit">Edit</button>
</form>
<button id="button" onclick="vyplnit()">Předvyplnit</button>


<script>

    function vyplnit(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("itemName").value = this.responseText;
        }
        xhttp.open("GET","/vyplneni/?id=" + <?= $_GET['id']; ?>);
        xhttp.send();
    }
</script>