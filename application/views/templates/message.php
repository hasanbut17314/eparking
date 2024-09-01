<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/> -->
<?php 
    if ($this->session->flashdata('success')) { ?>
        <script type="text/javascript">toastr.success('<?php echo $this->session->flashdata('success'); ?>');</script>
<?php  } ?>
<?php 
    if ($this->session->flashdata('error')) { ?>
        <script type="text/javascript">toastr.error('<?php echo $this->session->flashdata('error'); ?>');</script>
<?php } ?>