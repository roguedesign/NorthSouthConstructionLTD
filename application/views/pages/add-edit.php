<section id="about">
<div class='container'>
                    <div class='row'>
                    
                        <div class="col-lg-8 col-lg-offset-2 text-center">

                        <?php echo validation_errors(); ?>
                        <?php echo form_open(); ?>
                        <h2 class="section-heading">
                            <?php if ($edit): ?>
                                <?php echo html_escape($project->project_name); ?>
                            <?php else: ?>
                                NEW PROJECT
                            <?php endif; ?> 
                        </h2>
                            <hr class="primary"><br/>
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="project_name" class="control-label" style="color:#445878">PROJECT NAME</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="project_name" placeholder="Project Name" type="text" value="<?php echo set_value('project_name', $project->project_name); ?>"/>
                                        <span class="text-danger"><?php echo form_error('username'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/>
                                        <label for="project_category" class="control-label" style="color:#445878">PROJECT CATEGORY</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="project_category" placeholder="Project Category" type="text" value="<?php echo set_value('project_category', $project->project_category); ?>"/>
                                        <span class="text-danger"><?php echo form_error('project_gategory'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/>
                                        <label for="description" class="control-label" style="color:#445878">DESCRIPTION</label>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" name="description" placeholder="Description" type="text" value="<?php echo set_value('description', $project->description); ?>"/>
                                        <span class="text-danger"><?php echo form_error('description'); ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><br/>
                                        <input name="submit" type="submit" class="btn" value="CANCEL" />
                                        <input name="submit" type="submit" class="btn" value=<?php echo $edit ? 'EDIT' : 'ADD' ?> />
                                    </div>
                                </div>
                                
                            </fieldset>
                        <?php echo form_close(); ?>
                                </div>
                    </div>
                   </div>
                </section>