<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            opacity: 1;
        }

        .multi-line {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
        }

        .single-line {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <title>Toko Pak Dio</title>
</head>

<body class="pb-4">
    {{ $slot }}
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>
    const itemModal = document.getElementById("itemModal");
    if (itemModal) {
        itemModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute("data-bs-whatever");

            const result = recipient.split(',');

            // Update the modal's content.
            if (recipient != "none") {
                itemModal.querySelector(".modal-body #item_id").value = result[0];
                itemModal.querySelector(".modal-body #item_name").value = result[1];
                itemModal.querySelector(".modal-body #stock").value = result[3];
                itemModal.querySelector(".modal-body #price").value = result[4];
                itemModal.querySelector(".modal-body #description").value = result[2];
                itemModal.querySelector(".modal-body #stock").disabled=true;
            }

            const modalTitle = itemModal.querySelector(".modal-title");
            recipient == "none" ? modalTitle.textContent = `Tambah Item Baru` : modalTitle.textContent =
                `Edit Item`;
        });
    }

    const addModal = document.getElementById("addModal");
    if (addModal) {
        addModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute("data-bs-whatever");

            const result = recipient.split(',');

            // Update the modal's content.
            addModal.querySelector(".modal-body #item_name").value = result[2];
            addModal.querySelector(".modal-body #item_id").value = result[1];

            if(result[0] == "user"){
                addModal.querySelector("#add_action").action = "/tambah/saldo";
            }

            const modalTitle = addModal.querySelector(".modal-title");
            result[0] == "stok" ? modalTitle.textContent = `Tambah Stok Item` : modalTitle.textContent =
                `Tambah Saldo User`;
        });
    }
</script>

</html>
