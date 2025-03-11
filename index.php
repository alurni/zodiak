<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Kecocokan Nama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center">🔮 Cek Kecocokan Nama 🔮</h2>
        <form id="cekKecocokanForm">
            <div class="mb-3">
                <label for="nama1" class="form-label">Nama Pertama:</label>
                <input type="text" class="form-control" id="nama1" name="nama1" required>
            </div>
            <div class="mb-3">
                <label for="nama2" class="form-label">Nama Kedua:</label>
                <input type="text" class="form-control" id="nama2" name="nama2" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cek Kecocokan</button>
        </form>
        <div class="mt-4 text-center">
            <h4>Hasil:</h4>
            <p id="hasil" class="fw-bold"></p>
            <p id="alasan" class="fw-normal text-muted"></p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#cekKecocokanForm").submit(function(event) {
            event.preventDefault();
            var nama1 = $("#nama1").val();
            var nama2 = $("#nama2").val();
            
            $.ajax({
                type: "POST",
                url: "cek_kecocokan.php",
                data: { nama1: nama1, nama2: nama2 },
                success: function(response) {
                    const responseArr = response.split('|');
                    $("#hasil").html(responseArr[0]);
                    $("#alasan").html(responseArr[1]);
                }
            });
        });
    });
</script>

</body>
</html>
