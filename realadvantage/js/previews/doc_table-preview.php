<?php //docs library ?>


<script type="text/template" id="fusion-builder-block-module-doc_table-preview-template">
	<h4 class="fusion_module_title"><span class="fusion-module-icon {{ fusionAllElements[element_type].icon }}"></span>{{ fusionAllElements[element_type].name }}</h4>
	<p>Sample preview only, full set of documents will be displayed</p>
	<div class="docsTable">
		<table>
			<thead>
				<tr>
					<th>Document Title</th>
					<th>Category</th>
					<th>Date</th>
					<th>Download</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Some File Name</td>
					<td>Some Category</td>
					<td>MM/DD/YYYY</td>
					<td><i class="fas fa-download"></i></td>
				</tr>
				<tr>
					<td>Some File Name</td>
					<td>Some Category</td>
					<td>MM/DD/YYYY</td>
					<td><i class="fas fa-download"></i></td>
				</tr>
				<tr>
					<td>Some File Name</td>
					<td>Some Category</td>
					<td>MM/DD/YYYY</td>
					<td><i class="fas fa-download"></i> <strong>Click to Download</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<style>
		.docsTable {
			max-width: 800px;
			margin: 0 auto;
		}
		.docsTable table {
			width: 100%;
		}
		.docsTable table td {
			width: 20px;
		}
		.docsTable th {
			background-color: #000000;
			color: #ffffff;
			border: 1px solid #ffffff;
			border-top-width: 0;
			font-weight: bold;
		}
		.docsTable tbody > tr:nth-of-type(odd) {
			background: #eee; 
		}
		.docsTable td, .docsTable th { 
			padding: 6px; 
			border: 1px solid #ccc; 
			text-align: left; 
		}
	</style>
</script>