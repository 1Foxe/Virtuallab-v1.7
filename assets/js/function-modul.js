function UbahJenisModul() {

    var status = document.getElementById('jenisModul');

    if (status.value == '') {

        document.getElementById('pilihan').style.display = 'none';

    } else {

        document.getElementById('pilihan').style.display = 'block';

        if (status.value == 'File') {

            document.getElementById('file').style.display = 'block';
            document.getElementById('link').style.display = 'none';

        } else {

            document.getElementById('file').style.display = 'none';
            document.getElementById('link').style.display = 'block';

        }
    }
}