 <body class="container theme-showcase" role="main">
 
 <!--div class="row">
 
 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;margin-top: 10px;">

 <button id="submit" class="btn btn-default btn-lg btn-block">提交</button>
 </div>
 
 <div class="col-md-1 col-sm-1 col-xs-2" >
 <label for="author">author</label>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="author" value=""/>
  </div>
  
  <div class="col-md-1 col-sm-1 col-xs-2">
 <h5>date</h5>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="date" value=""/>
  </div>
  
  <div class="col-md-1 col-sm-1 col-xs-2">
 <h5>title</h5>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="title" value=""/>
  </div>
  
  <div class="col-md-1 col-sm-1 col-xs-2">
 <h5>tags</h5>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="tags" value=""/>
  </div>
  
  <div class="col-md-1 col-sm-1 col-xs-2">
 <h5>category</h5>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="category" value=""/>
  </div>
  
  <div class="col-md-1 col-sm-1 col-xs-2">
 <h5>status</h5>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="status" value=""/>
  </div>
  
  <div class="col-md-1 col-sm-1 col-xs-2">
 <h5>summary</h5>
 </div>
 
 <div class="col-md-11 col-sm-11 col-xs-10" style="margin-bottom: 10px;">
  <input class="form-control" type="text" id="summary" value=""/>
  </div>
  
  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
  <textarea class="form-control" id="text-input" oninput="this.editor.update()" rows="30" cols="100%">Type **Markdown** here.</textarea>
	 </div>
	 
	 <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
  <div id="preview"> </div>
  </div>
  
</div-->
	 
	<form role="form">

 
 
 <div class="form-group">
 <label for="author">author</label>
 <input class="form-control" type="text" id="author" placeholder="请输入作者"/>
</div>
  
  <div class="form-group">
 <label for="date">date</label>
  <input class="form-control" type="text" id="date" placeholder="请输入日期"/>
  </div>
  
 <div class="form-group">
 <label for="title">title</label>
  <input class="form-control" type="text" id="title"  placeholder="请输入标题"/>
  </div>
  
  <div class="form-group">
 <label for="tags">tags</label>
  <input class="form-control" type="text" id="tags" placeholder="请输入标签"/>
  </div>
  
  <div class="form-group">
 <label for="category">category</label>
  <input class="form-control" type="text" id="category" placeholder="请输入分类"/>
  </div>
  
  <div class="form-group">
 <label for="status">status</label>
  <input class="form-control" type="text" id="status"  placeholder="请输入状态"/>
  </div>
  
  <div class="form-group">
 <label for="summary">summary</label>
  <input class="form-control" type="text" id="summary"  placeholder="请输入summary"/>
  </div>
  
 <div class="form-group">
  <textarea class="form-control" id="text-input" oninput="this.editor.update()" rows="30" cols="100%">Type **Markdown** here.</textarea>
	 </div>
	 
	 <div class="form-group">
  <div id="preview"> </div>
  </div>
  
  <button id="submit" class="btn btn-default btn-lg btn-block">提交</button>
  
</div>
	
    
	<script>
	  $(document).ready(function(){
	$("button").click(function(){
     $.post('http://192.168.1.108/simple_cms/index.php/md/file_proc',
	 { 
	 content:$$("text-input").value,
	 author:$$("author").value,
	 date:$$("date").value,
	 title:$$("title").value,
	 tags:$$("tags").value,
	 category:$$("category").value,
	 status:$$("status").value,
	 summary:$$("summary").value
	 },
     function(data,status){alert(status);}
	 );
	});
	});
    </script>
	
    <script>
      function Editor(input, preview) {
        this.update = function () {
		  //alert("fs");
          preview.innerHTML = markdown.toHTML(input.value);
        };
        input.editor = this;
        this.update();
      }
      var $$ = function (id) { return document.getElementById(id); };
      new Editor($$("text-input"), $$("preview"));
	  </script>
  </body>