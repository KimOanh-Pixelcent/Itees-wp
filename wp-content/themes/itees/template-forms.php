<?php 
	/*
	** Template name: Template - Form
	*/
	get_header(); ?>

	<style>
		.form-editor{
			font-size: 18px;
		}
		.form-editor h2{
			color: rgb(0,53,102);
		    font-weight: 600;
		    font-size: 30px;
		}
		.form-editor h3{
			font-size: 20px;
		}
		.blue-color{
			color: rgb(0,53,102);
		}
		.blue-light{
			color: rgb(0,0,204);
		}
		.green-light{
			color: rgb(84,130,53);
		}
		.red-color{
			color: rgb(192,0,0)
		}
		.bold{
			font-weight: bold;
		}
		.w-600{
			font-weight: 600;
		}
		.size-16{
			font-size: 16px;
		}
		.d-block-child > *{
			display: block; 
		}
		.three-list, .three-list-auto{
		    display: flex;
		    flex-wrap: wrap;
		}		
		.check-list, .three-list-auto{
		    justify-content: space-between;
		}		
		.three-list *, .text-left-child *{
			text-align: left; 
		}
		.form-editor textarea{
			height: 180px;
			padding: 0 10px;
			margin-left: 5px;
			width: 100%; 
		}		
		.other-float{
			display: flex;
			flex-wrap: wrap;
		}
		.other-label-none .wpcf7-list-item-label{
			display: none; 
		}
		input.wpcf7-submit {
		    background-color: var(--main-color);
		    color: #fff;
		    border: 1px solid #fff;
		    display: block;
		    margin: auto;
		    padding: 10px;
		    width: 213px;
		    height: 51px;
		    transition: all .2s linear;
		    justify-content: center;
		    font-weight: 700;
		    margin-top: 3rem;
		}
		input.wpcf7-submit:hover {
		    transform: scale(.95);
		}
		.flex-w{
			flex: 1;
    		padding: 0 8px;
		}
		.flex-2{
			flex: 2;
		}
		.flex-3{
			flex: 3;
		}
		.annex-b.three-list-auto .item:first-child {
		    width: 390px;
		}
		.annex-b .flex-2 .wpcf7-form-control{
			width: 92%;
		}
		.annex-b .flex-2 textarea {
		    padding: 0;
		    margin: 0;
		}
		.annex-b .flex-2 .wpcf7-form-control-wrap{
			vertical-align: middle;
		}
		.annex-b.two-list-auto .item:first-child {
		    width: 450px;
		}
		.flex-wrap{
			display: flex;
			flex-wrap: wrap;
		}
		.jus-content{
			justify-content: space-between;
		}
		.w-650{
			max-width: 650px;
    		width: 100%;
		}
		.wh-100-child *{
			width: 100%; 
			height: 100%;
		}
		.w-auto-child *{
			width: auto !important;
		}
		.flex-5-item > div{
			width: 20%;
		}
		.annex-b .flex-2.flex-5-item .wpcf7-form-control{
			width: 85%;
		}
		.width-100-child *{
			width: 100%;
		}
		.width-100-child-im *{
			width: 100% !important
		}
		.bg-transparent-child *{
			background-color: transparent !important;
		}
		.cb-list-width .wpcf7-checkbox > span:not(:last-child) {
		    max-width: 150px;
		    width: 100%;
		}
		.cb-list-width .wpcf7-checkbox > span{
		    margin-left: 0; 
		}
		.cb-list-width .wpcf7-checkbox > span label {
		    display: flex;
		    align-items: center;
		}
		.cb-list-width .wpcf7-checkbox > span label span{
			padding-left: 5px;
		}
		.cb-four-list-width .wpcf7-checkbox > span:not(:last-child) {
		    max-width: 225px;
		    width: 100%;
		}
		.border-bottom-line{
			border-right: none;
		    border-top: 0;
		    border-left: 0;
		    border-color: #989898;
		    border-width: 1px;
		}
		.page-id-642 .form-editor,
		.page-id-659 .form-editor,
		.page-id-663 .form-editor{
			background-color: #f1f1f1;
		}
		body .form-editor > .container{
			padding-left: 15px;
    		padding-right: 15px;
		}
		.form-editor .page-custom{
			background-color: white; 
			padding: 30px;
		}
		.cb-list-block .wpcf7-list-item label {
		    display: flex;
		    align-items: baseline;
		    grid-gap: 10px;
		}		
		.mb-show{
			display: none; 
		}
		.fade-half{
			opacity: .5;
		}
		@media only screen and (max-width: 1756px){
			.three-list > *{
				width: 33.33%;
			}
		}
		@media only screen and (max-width: 1600px){
			.mb-show{
				display: block; 
			}
			.application-item div b:first-child{
				margin-bottom: 20px;
    			display: inline-block;
			}
		}
		@media only screen and (min-width: 1441px){
			.form-editor > .container{
				padding-left: 60px;
   	 			padding-right: 60px;
			}
		}
		@media only screen and (max-width: 1440px){
			.form-editor h2 {
			    font-size: 22px;
			}
			.form-editor {
			    font-size: 16px;
			}
			.form-editor .group .item > div{
				font-size: 16px;
			}
			.form-editor .group .item .size-18{
				font-size: 14px;
			}
			.textarea-other{
				width: 90%;
			}
			.annex-b.three-list-auto .item:first-child, .annex-b.two-list-auto .item:first-child{
			    width: 300px;
			}
		}
		@media only screen and (max-width: 1400px){
			.annex-b .flex-2.flex-5-item .wpcf7-form-control {
			    width: 100%;
			}
		}
		@media only screen and (max-width: 1199px){
			.textarea-other{
				width: 100%;
			}
		}
		@media only screen and (max-width: 991px){
			.three-list > * {
			    width: 100%;
			}
			.three-list-auto {
			    flex-direction: column;
			}
			.annex-b.two-list-auto .item,.three-list-auto > .item {
			    max-width: 100% !important;
			    width: 100% !important; 
			}
			.annex-b.two-list-auto .item:first-child, .annex-b.three-list-auto .item:first-child {
			    margin-bottom: 20px;
			}
			.three-list-auto > .item.flex-2 {
			    margin-bottom: 15px;
			}
			.three-list-auto>.item.flex-2 > span:first-child {
			    width: 14px;
			    display: inline-block;
			}
			.flex-w{
				padding: 0; 
			}
			.annex-b.two-list-auto .item{
				flex-wrap: wrap;
			}
			.flex-5-item > div {
			    width: 33.33%;
			    margin-bottom: 15px;
			}
			.cb-list-width .wpcf7-checkbox > span:not(:last-child) {
			    max-width: 33.33%;
			    width: 100%;
			}
			.three-list-auto.two-list-auto > .item.flex-2 > span:first-child{
				width: 100%; 
			}
			.application-item div > span{
				display: block; 
			}
			.application-item div b:first-child, .application-item div b{
				margin-bottom: 10px;
				display: inline-block;
			}
		}
		@media only screen and (max-width: 600px){
			.flex-5-item > div{
			    width: 50%;
			}
			.cb-list-width .wpcf7-checkbox > span:not(:last-child){
			    max-width: 45%;
			}
			.item .w-auto, .w-auto-child *{
			    width: 100% !important;
			}
			.three-list-auto > .item.flex-2:last-child{
				margin-bottom: 0; 
			}	
			.annex-b .flex-2 .wpcf7-form-control {
			    width: 100%;
			}	
			.form-editor .page-custom {
			    padding: 15px;
			}	
			.w-auto-child .wpcf7-radio *{
				width: auto !important; 
			}
		}
		@media only screen and (min-width: 481px){
			.checkbox-profession .wpcf7-list-item.first {
			    margin-left: 10px;
			    width: 49%;
			}
		}
		@media only screen and (max-width: 480px){
			.form-editor h2{
				font-size: 20px;
			}
			.form-editor {
			    font-size: 16px;
			}
			.form-editor .size-18, .item.blue-color {
			    font-size: 14px;
			}
			.cb-list-width .wpcf7-checkbox > span:not(:last-child), .flex-5-item > div{
			    max-width: 100%;
			    width: 100%;
			}
			.form-editor p {
			    margin-bottom: 12px;
			}			
			.border-bottom-line{
				width: 100% !important; 
			}
			.application-item > div > span input {
			    width: 100% !important;
			}
			.form-editor textarea {
			    margin: 0;
			    height: 150px;
			    padding: 5px 10px;
			}
		}
	</style>

	<div class="form-editor">
		<div class="container">
			<div class="content pt-5 pb-lg-5 pb-3 text-justify">
				<?php 
					while ( have_posts() ) : the_post() ;
				        the_content(); 
				    endwhile;
				 ?>				
			</div>
		</div>
	</div>
<?php get_footer('content'); ?>

        
<script>
	jQuery(document).ready(function() {

		jQuery('.past_pro input, .current_pro input').attr('readonly', true);
		jQuery('.past_pro, .current_pro').addClass('fade-half');
		jQuery('.checkbox-profession input').change(function(){
			if(jQuery('input[value="Past Profession"]').is(":checked")){
				jQuery('.past_pro input').attr('readonly', false);
				jQuery('.past_pro').removeClass('fade-half');
			}
			else{
				jQuery('.past_pro input').attr('readonly', true);
				jQuery('.past_pro').addClass('fade-half');
			}
			if(jQuery('input[value="Current Profession"]').is(":checked")){
				jQuery('.current_pro input').attr('readonly', false);
				jQuery('.current_pro').removeClass('fade-half');
			}
			else{
				jQuery('.current_pro input').attr('readonly', true);
				jQuery('.current_pro').addClass('fade-half');
			}
		});
		
	});
	
</script>