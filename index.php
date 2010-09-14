<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>BeachPHP</title>
        
        <script type="text/javascript" src="/dojo/dojo/dojo.js" djConfig="debugAtAllCosts:true"></script>
        <script type="text/javascript">
		//<![CDATA[
            dojo.require('beach.Editor');
            dojo.require("dijit.layout.BorderContainer");
            dojo.require("dijit.layout.TabContainer");
            dojo.require("dijit.layout.AccordionContainer");
            dojo.require("dijit.layout.ContentPane");
            dojo.require("dojox.layout.ExpandoPane");
			dojo.require('dijit.form.CheckBox');
            dojo.addOnLoad(function(){
	            dojo.parser.parse();
	            var editor = new beach.Editor({target:'output'}, 'code');
			});
			//]]>
        </script>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/dojo/dijit/themes/soria/soria.css" />
        <link rel="stylesheet" type="text/css" href="dojo/dojox/layout/resources/ExpandoPane.css" />
		<style type="text/css">
		    /*<![CDATA[*/
            body, html { font-family: 'Droid Sans Mono', arial, serif; }
			html, body { width: 100%; height: 100%; margin: 0px; }
			h1 { font-family: 'Droid Sans', arial, serif; margin:0px; font-size:30px;}
			#editRegion { font-size:24px; }
			textarea { font-family: 'Droid Sans Mono', arial, serif;  font-size:24px;}
			.dijit {font-size:14px;}
			/*]]>*/
        </style>
		
    </head>
    <body class="soria">
        <div dojoType="dijit.layout.BorderContainer" style="width: 100%; height: 100%;">
            <div dojoType="dijit.layout.ContentPane" region="top" style="height:40px;">
                <h1>&lt;?BeachPHP Sandbox</h1>
            </div>

            <div dojoType="dijit.layout.BorderContainer" id="editRegion" region="center">
                <div dojoType="dijit.layout.ContentPane" dojoId="output" id="output" region="top" splitter="true" style="padding:20px;height:300px;">
	                Output pane
	            </div>	
	            <div dojoType="dijit.layout.ContentPane" region="center" editable="true" style="margin:0px;padding:0px;overflow-x:hidden;overflow-y:scroll">
		            <textarea id="code" name="code" cols="100" rows="100" style="height:98%;width:98%;padding:2%" >&lt;?php
echo "Welcome to BeachPHP!";</textarea>
		        </div>
            </div>
			<div dojoType="dojox.layout.ExpandoPane" 
							splitter="true" 
							region="right" 
							id="rightPane" 
							maxWidth="275" 
							title="Tools"
							style="width:275px" 
							easeIn="dojox.fx.easing.backOut" 
							easeOut="dojox.fx.easing.backInOut">
			<div dojoType="dijit.layout.AccordionContainer" style="width:200px">
                <div dojoType="dijit.layout.AccordionPane" title="Settings">

	                     <label><input dojoType="dijit.form.CheckBox" title="Enable ZF Autoloader" type="checkbox" value="yes" <?php echo (file_exists('Zend/Loader/Autoloader.php')) ? 'disabled="disabled"' : ''; ?>/> Enable ZF Autoloader</label>
                </div>
                <div dojoType="dijit.layout.AccordionPane" title="Snippits">
                    Settings pane #2
                </div>
                <div dojoType="dijit.layout.AccordionPane" title="Misc">
                    Settings pane #3
                </div>
            </div>	
</div>
        </div>
    </body>
</html>