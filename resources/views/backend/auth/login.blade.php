<!DOCTYPE html>
<html>
<head>
    <title>{{trans('lang_admin.login_admin')}}</title>
    <link href="{{ url('backend/css/login.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-top:200px;">
    <section id="content">
        <form action="{{ route('login') }}" class="form-horizontal" role="form" method="POST">
            {{ csrf_field() }}
            <h1>{{trans('lang_admin.login_admin')}}</h1>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    
                    <input id="username" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" placeholder="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>
        </form><!-- form -->
    </section><!-- content -->
    </div><!-- container -->
</body>
</html>
