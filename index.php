<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>BeachPHP</title>
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
        <script type="text/javascript" src="/dojo/dojo/dojo.js" djConfig="parseOnLoad: true"></script>
        <script type="text/javascript">
		//<![CDATA[
            dojo.require('beach.Editor');
            dojo.require("dijit.layout.BorderContainer");
            dojo.require("dijit.layout.TabContainer");
            dojo.require("dijit.layout.AccordionContainer");
            dojo.require("dijit.layout.ContentPane");
			//]]>
        </script>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="/dojo/dijit/themes/soria/soria.css" />
		<link type="text/css" rel="stylesheet" href="css/SyntaxHighlighter.css" />
		<script type="text/javascript" src="js/shCore.js"></script>
		<script type="text/javascript" src="js/shBrushPhp.js"></script>
		<script type="text/javascript" src="js/shBrushXml.js"></script>
		<script type="text/javascript">
		//<![CDATA[
		dp.SyntaxHighlighter.ClipboardSwf = '/flash/clipboard.swf';
		dp.SyntaxHighlighter.HighlightAll('code');
		//]]>
		</script>
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
		            <textarea id="code" dojoType="beach.Editor" target="output" name="code" cols="100" rows="100" class="php" style="height:98%;width:98%;padding:2%" >&lt;?php
echo "Welcome to BeachPHP!";</textarea>
		        </div>
            </div>
			<div dojoType="dijit.layout.AccordionContainer" region="trailing" toggleSplitterOpenSize="40" toggleSplitterOpen="true" splitter="true" style="width:200px">
                <div dojoType="dijit.layout.AccordionPane" title="pane #1">
                    Settings pane #1
                </div>
                <div dojoType="dijit.layout.AccordionPane" title="pane #2">
                    Settings pane #2
                </div>
                <div dojoType="dijit.layout.AccordionPane" title="pane #3">
                    Settings pane #3
                </div>
            </div>	
        </div>
    </body>
</html>