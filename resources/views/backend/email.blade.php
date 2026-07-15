@extends('layouts.backend.master')
@section('admin')
 <div class="content">
    
            <!-- content HEADER -->
            <!-- ========================================================= -->
            <div class="content-header">
                <!-- leftside content header -->
                <div class="leftside-content-header">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                        <li><a>{{ $subTitle }}</a></li>
                    </ul>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--SEARCHING, ORDENING & PAGING-->
            <div class="row animated fadeInUp">
                <!--MAX LENGTH-->
                <div class="col-sm-6 col-md-12">
                    
                    <div class="panel">
                        <form id="myForm" method="POST"
                        action="{{ route('admin.email.add.update.info') }}"
                        enctype="multipart/form-data">
                      @csrf
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SMTP Mailer</label>
                                        <input type="text" class="form-control form-control-solid" name="mail_mailer"
                                        value="{{env('MAIL_MAILER')}}" required />
                                        @error('mail_mailer')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SMTP Host Name</label>
                                        <input type="text" class="form-control form-control-solid" name="mail_host"
                                        value="{{env('MAIL_HOST')}}" required />
                                        @error('mail_host')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SMTP Port</label>
                                        <input type="text" class="form-control form-control-solid" name="port"
                                        value="{{env('MAIL_PORT')}}" required>
                                        @error('port')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SMTP Username</label>
                                        <input type="text" class="form-control form-control-solid"
                                        name="mail_username" value="{{env('MAIL_USERNAME')}}" required />
                                        @error('mail_username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                              
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SMTP Password</label>
                                        <input type="password" class="form-control form-control-solid"
                                        name="password" value="{{env('MAIL_PASSWORD')}}" required />
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Mail Encryption</label>
                                        <input type="text" class="form-control form-control-solid" name="mail_encryption"
                                        value="{{env('MAIL_ENCRYPTION')}}" required />
                                        @error('mail_encryption')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Sender Email</label>
                                        <input type="text" class="form-control form-control-solid" name="email_name"
                                        value="{{env('MAIL_FROM_ADDRESS')}}" required />
                                        @error('email_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Sender Name</label>
                                        <input type="text" class="form-control form-control-solid" name="mail_name"
                                        value="{{env('MAIL_FROM_NAME')}}" required />
                                        @error('mail_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                          
                         
                        
                         
                        
                            
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>

        <!-- JS at the bottom -->


@endsection

