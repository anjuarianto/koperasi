<!DOCTYPE html>
<html>

<head>
	<title>Webslesson Tutorial | Autocomplete Textbox using Bootstrap Typehead with Ajax PHP</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?=base_url()?>assets\vendorother\typehead\dist\typeahead.jquery.js"></script>
<script src="<?=base_url()?>assets\vendorother\typehead\dist\typeahead.bundle.min.js"></script>
<script src="<?=base_url()?>assets\vendorother\typehead\dist\bloodhound.js"></script>
<script src="<?=base_url()?>assets\vendorother\typehead\dist\typeahead.bundle.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
</head>

<body>
<div id="custom-templates">
  <input class="typeahead" type="text" placeholder="Oscar winners for Best Picture">
</div>
</body>

</html>

<script>
	const baseUrl = '<?=base_url()?>'
    var bestPictures = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: 'https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/films/post_1960.json',
  remote: {
    url: 'https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/films/%QUERY.json',
    wildcard: '%QUERY'
  }
});

$('#remote .typeahead').typeahead(null, {
  name: 'best-pictures',
  display: 'value',
  source: bestPictures
});
</script>
