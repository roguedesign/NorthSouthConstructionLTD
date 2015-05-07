<section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">PROJECTS</h2>
                    <hr class="primary"><br/>
                    <p></p>
                        <?php
                        //success message
                        if ($this->session->flashdata('success')):
                            ?>
                            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>
                        <?php
                        //error message
                        if ($this->session->flashdata('error')):
                            ?>
                            <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error'); ?></div>
                        <?php endif; ?>
                        <?php
                        //for bootstrap of table
                        $tbl_tmpl = array(
                            'table_open' => '<table class="table">',
                        //    'heading_cell_start' => '<th>',
                        );
                        $tbl_heading = array(
                            '0' => array('data' => 'PROJECT NAME', 'class' => 'col-sm-3'),
                            '1' => array('data' => 'PROJECT CATEGORY', 'class' => 'col-sm-3'),
                            '2' => array('data' => 'DESCRIPTION', 'class' => 'col-sm-3'),
                            '3' => array('data' => 'ADD | EDIT', 'class' => 'col-sm-3'));
                            
                            
                        $this->table->set_template($tbl_tmpl);
                        $this->table->set_heading($tbl_heading);

                        //generate table
                        echo $this->table->generate($project); ?>

                </div>                
                    
                
                
                <div class="col-lg-4 text-center">
                    <h3 style="color: #e98f00"></h3>
                            <div class="container">
                                    
                                    
                    
                </div>
            </div>
        </div>
    </section>