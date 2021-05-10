<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		@media print {
			@page {
				margin: 0;
			}

			body {
				margin: 1.6cm;
				font-family: 'Arial';
			}

			.border {
                border: 2px solid black;
				display: inline-block;
			}

            hr {

            }
            .harga-barang {
                    padding-bottom : 0px;
                    /* background-color: yellow; */
                    font-size: 26px;
                    font-weight: bold;
                    padding-top: 30px;
                    padding-left: 10px;
                    padding-right: 100px;
                    padding-bottom: 5px
            }

            hr {
                padding: 0;
                margin: 0;
                border: 1px solid black;
            }

            .nama-barang {
                /* background-color: red; */
                padding: 10px;
                font-size: 12px;
            }
		}

        body {
				margin: 1.6cm;
				font-family: 'Arial';
			}

			.border {
                border: 2px solid black;
				display: inline-block;
			}

            hr {

            }
            .harga-barang {
                    padding-bottom : 0px;
                    /* background-color: yellow; */
                    font-size: 26px;
                    font-weight: bold;
                    padding-top: 30px;
                    padding-left: 10px;
                    padding-right: 100px;
                    padding-bottom: 5px
            }

            hr {
                padding: 0;
                margin: 0;
                border: 1px solid black;
            }

            .nama-barang {
                /* background-color: red; */
                padding: 10px;
                font-size: 12px;
            }

	</style>
</head>

<body>
	<div class="border">
		<div class="harga-barang">
			Rp. <?=number_format($harga_jual, 0, ',', '.')?>
		</div>
        <hr>
		<div class="nama-barang">
			<?=$nama_barang?>
		</div>
	</div>
</body>

<script>
	window.print();

</script>

</html>
