
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.partials._head')

    <script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: 'Nothing selected',
            nothing_found: 'Nothing found',
            choose_file: 'Choose file',
            file_selected: 'File selected',
            files_selected: 'Files selected',
            add_more_files: 'Add more files',
            adding_more_files: 'Adding more files',
            drop_files_here_paste_or: 'Drop files here, paste or',
            browse: 'Browse',
            upload_complete: 'Upload complete',
            upload_paused: 'Upload paused',
            resume_upload: 'Resume upload',
            pause_upload: 'Pause upload',
            retry_upload: 'Retry upload',
            cancel_upload: 'Cancel upload',
            uploading: 'Uploading',
            processing: 'Processing',
            complete: 'Complete',
            file: 'File',
            files: 'Files',
        }
	</script>
</head>

<body>


        @include('admin.partials._nav')
        @include('admin.partials._sidenav')


        <main class="content">

            @include('admin.partials._topbar')

            @yield('content')

            @include('admin.partials._footer')
        </main>




        @include('admin.partials._scripts')



</body>

</html>
