<section id="about">
<div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">ADD NEW PROJECT</h2>
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
                            <?php echo validation_errors(); ?>
                        <?php echo form_open('projects/add_edit'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="project_name" class="control-label" style="color:#445878">PROJECT NAME</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="project_name" placeholder="Project Name" type="text" value=""/>
                                        <span class="text-danger"><?php echo form_error('project_name'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/>
                                        <label for="project_category" class="control-label" style="color:#445878">PROJECT CATEGORY</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="project_category" placeholder="Project Category" type="text" value=""/>
                                        <span class="text-danger"><?php echo form_error('project_gategory'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/>
                                        <label for="description" class="control-label" style="color:#445878">DESCRIPTION</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="description" placeholder="Description" type="text" value=""/>
                                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/>   
                                        <div class="col-md-12">
                                            <?php echo form_open_multipart('upload/do_upload');?>
                                            <label for="upload" class="control-label" style="color:#445878">UPLOAD A PICTURE</label>
                                        </div>
                                        <div class="col-md-12">
                                            <input class="form-control" size="20" name="userfile" type="file" /><br/>
                                            <input type="submit" value="upload" class="btn" />
                                            <span class="text-danger"><?php echo form_error('upload'); ?></span>
                                            <?php echo form_close(); ?>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/><br/>
                                        <input name="submit" type="submit" class="btn" value="ADD" /><br/><br/>
                                    </div>
                                </div>
                                
                            </fieldset>
                        <?php echo form_close(); ?>
                        <br/><br/>
                        <h2 class="section-heading">MY PROJECTS</h2>
                        <hr class="primary"><br/>
                        <?php
                        //for bootstrap of table
                        $tbl_tmpl = array(
                            'table_open' => '<table class="table">',
                        //    'heading_cell_start' => '<th>',
                        );
                        $tbl_heading = array(
                            '0' => array('data' => 'PROJECT NAME', 'class' => 'col-sm-3'),
                            '1' => array('data' => 'PROJECT CATEGORY', 'class' => 'col-sm-3'),
                            '2' => array('data' => 'DESCRIPTION', 'class' => 'col-sm-3'));
                            
                            
                            
                        $this->table->set_template($tbl_tmpl);
                        $this->table->set_heading($tbl_heading);

                        //generate table
                        echo $this->table->generate($project); ?>
                    </div>
                </div>                
                    
                
                
                
        </div>
    </section>