<div class="container">
    <?php
            if($this->session->flashdata('success')){
                echo "<div class=\"alert alert-success\"><strong>Hola! </strong>";
                echo $this->session->flashdata('success');
                echo "</div>";
            }        
        ?>

</div>