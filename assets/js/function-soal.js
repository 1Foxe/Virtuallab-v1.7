function UbahJenisSoal() {

    var status = document.getElementById("jenisSoal");

    if (status.value == '') {

        document.getElementById("pilih_soal").style.display = "none";

    } else {

        document.getElementById("pilih_soal").style.display = "block";

        if (status.value == "Ganda") {

            document.getElementById("pertanyaan").style.display = "block";
            document.getElementById("ganda1").style.display = "block";
            document.getElementById("ganda2").style.display = "block";
            document.getElementById("ganda3").style.display = "block";
            document.getElementById("ganda4").style.display = "block";
            document.getElementById("ganda5").style.display = "block";
            document.getElementById("hasil_ganda").style.display = "block";
            document.getElementById("hasil_boolean").style.display = "none";
            document.getElementById("upload_gambar").style.display = "block";

        } else if (status.value == "Essay") {

            document.getElementById("pertanyaan").style.display = "block";
            document.getElementById("ganda1").style.display = "none";
            document.getElementById("ganda2").style.display = "none";
            document.getElementById("ganda3").style.display = "none";
            document.getElementById("ganda4").style.display = "none";
            document.getElementById("ganda5").style.display = "none";
            document.getElementById("hasil_ganda").style.display = "none";
            document.getElementById("hasil_boolean").style.display = "none";
            document.getElementById("upload_gambar").style.display = "block";

        } else {

            document.getElementById("pertanyaan").style.display = "block";
            document.getElementById("ganda1").style.display = "none";
            document.getElementById("ganda2").style.display = "none";
            document.getElementById("ganda3").style.display = "none";
            document.getElementById("ganda4").style.display = "none";
            document.getElementById("ganda5").style.display = "none";
            document.getElementById("hasil_ganda").style.display = "none";
            document.getElementById("hasil_boolean").style.display = "block";
            document.getElementById("upload_gambar").style.display = "block";
            
        }
    }
}