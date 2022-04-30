@extends('adminlte::page')

@section('title', 'Image Editor')

<style>
    .tui-image-editor {
  width: 300px;
  height:90px;
  overflow: hidden;
}

.tui-image-editor-container {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  min-height: 300px;
  height: 100%;
  position: relative;
  background-color: #282828;
  overflow: hidden;
  letter-spacing: 0.3px;
}

</style>    
@section('content_header')
<div class="row">
    <div class="col-6">
        <h1>Image Editor</h1>
    </div>
    <div class="col-6">
        <a href="/create_posts" type="button" class="btn btn-primary float-right mb-1">Post</a>
    </div>
</div>
    

@stop
<style>
    @import url(http://fonts.googleapis.com/css?family=Noto+Sans);
</style> 

@section('content')
<div id="tui-image-editor-container" "></div>

                            
@stop

@section('css')
<link type="text/css" href="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.css" rel="stylesheet">
<link rel="stylesheet" href="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.css">
   
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script> console.log('Hi!'); </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.0/fabric.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui.code-snippet/v1.5.0/tui-code-snippet.min.js"></script>
    <script type="text/javascript" src="https://uicdn.toast.com/tui-color-picker/v2.2.6/tui-color-picker.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
    <script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>
    <!-- <script type="text/javascript" src="./js/theme/white-theme.js"></script>
    <script type="text/javascript" src="./js/theme/black-theme.js"></script> -->
    <script>
     // Image editor
     imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
    includeUI: {
      loadImage: {
        path: 'img/wallpaper.png',
        name: 'wallpaper'
      },
     
      menu: ['crop', 'flip', 'rotate', 'draw', 'shape', 'icon', 'text', 'mask', 'filter'],
      initMenu: 'filter',
      uiSize: {
        width: '100%',
        height: '580px'
      },
      menuBarPosition: 'bottom'
    },
    selectionStyle: {
      cornerSize: 5,
      rotatingPointOffset: 70
    }
});
    </script>  
@stop