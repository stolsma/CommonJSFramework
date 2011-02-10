<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Algemene Start Template 1024 application-0.5.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
  <!-- InstanceBeginEditable name="doctitle" -->
  <title>Tolsma Telematica Consultancy</title>
  <!-- InstanceEndEditable -->
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
  <script language="javascript" src="/webapps/application-0.5/application.js"></script>
</head>

<body bgcolor="#d0d0d0" class="app1024">
<div id="Container">
	<div id="PageHeader">
		<div id="Kop">&nbsp;</div>
		<div id="Titel"><!-- InstanceBeginEditable name="Titel" -->Tolsma<span class="Titeladd"> Telematica Consultancy</span><!-- InstanceEndEditable --></div>
		<div id="Subkop"><!-- InstanceBeginEditable name="Subkop" -->Blog<!-- InstanceEndEditable --></div>
		<div id="Menu">
			<ul id="nav" class="menu">
<?php 
// Page Inputparameters goed checken en als nodig met standaardwaarden setten 1=ijw.nu, 2=sander.tolsma.net, 3=www.tolsma.net, 4=mirjam.tolsma.net, 5=code.tolsma.net
  $webid=5;  

// Laad de menubar code en voer uit, path nog automatiseren d.m.v. standaard globale php variabelen zoals bij Screensize Div
include($_SERVER["DOCUMENT_ROOT"] . '/menubar.inc.php');
?>
			</ul>
		</div>
        <div App:Widget="login" class="loginStatus"></div>
	</div>
	<div id="PageContent">
       <!-- InstanceBeginEditable name="Hoofd Edit regio" -->
		<div class="Content">
			<div style="text-align:center">
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">CommonJS Reference Framework</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://code.tolsma.net/blog/commonjs" property="cc:attributionName" rel="cc:attributionURL">Sander Tolsma et al.</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.
			</div>
			<div class="Inhoudskop">
				<p>CommonJS Reference Framework (version 0.4, this post is still under edit!)</p>
			</div>
			<p>During the last 4 months I started to get involved in the world of standards for JavaScript Modules and Packages. Something I think is very important if JavaScript wants to rule the world in the next 5 years ;-) After some investigation I found out that there is a group of developers that is interested in the same thing and they already work together in a sort of Development Group called <a href="http://commonjs.org" title="The CommonJS Website" target="_new">CommonJS</a>. The only problem was that is was very difficult to get a clear overview of the direction and interaction of the current 'standards' of the group. That's why I started this post: a reference framework describing the CommonJS standards.</p>
			
			<div class="Subkop">What is CommonJS</div>
			<p>JavaScript  is a powerful object oriented language with some of the fastest dynamic  language interpreters around. The official JavaScript specification defines  APIs for some objects that are useful for building browser-based applications.  However, the spec does not define a standard library that is useful for  building a broader range of applications.</p>
			<p>So, what is  holding JavaScript back from world domination?</p>
			<ul>
				<li>JavaScript  has no module system. To compose JavaScript scripts, they must be either  managed in HTML, concatenated, injected, or manually fetched and evaluated.  There is no native facility for scope isolation or dependency management.</li>
				<li>JavaScript  has no standard library. It has a browser API, dates, and math, but no file  system API, much less an IO stream API or primordial types for binary data.</li>
				<li>JavaScript  has no standard interfaces for things like Web servers or databases.</li>
				<li>JavaScript  has no package management system that manages dependencies and automatically  installs them, except JSAN (not to be confused with JSON), which falls short  for scope isolation.</li>
			</ul>
			<p>The  CommonJS API will fill that gap by defining APIs that handle many common  application needs, ultimately providing a standard library as rich as those of Python,  Ruby and Java. The intention is that an application developer will be able to write an application using the CommonJS APIs and then run that application  across different JavaScript interpreters and host environments. With CommonJS-compliant systems, you can use JavaScript to write:</p>
			<ul>
				<li>Server-side  JavaScript applications</li>
				<li>Command  line tools</li>
				<li>Desktop  GUI-based applications</li>
				<li>Hybrid  applications (Titanium, Adobe AIR)</li>
				<li>Browser  based Applications (User Agents)</li>
			</ul>
			<p>To get order in the chaos the CommonJS Reference Framework is defined which describes the interaction between the basic CommonJS  layers:</p>
			<div style="width: 650px; height: 356px; margin: 0px auto 0px auto;" >
				<a href="CommonJS Environment Framework v0.4.png" target="_new">
					<img src="CommonJS Environment Framework v0.4.png" width="650" height="356" align="middle" />
				</a>
			</div>
			<br />
			<p>In the next chapters the high level use of those layers will be described.</p>
			
			<div class="Subkop">Core CommonJS System Layer</div>
			<div style="float:right; overflow:auto; margin: 10px 0px 10px 10px;"><a href="Core CommonJS Layer v0.4.png" target="_new"><img src="Core CommonJS Layer v0.4.png" width="200" height="181" longdesc="Layer 1 in the Architecture" /></a></div>
			<p>This is the basic CommonJS layer with stores for Module, Package and Context definitions and functions for manipulating those stores and the host environment. The total CommonJS Environment consists of an ECMAScript execution environment embedded in an application such as a web browser or scripting host, known as the host environment. In an addition to the ECMAScript interpreter, the CommonJS environment provides a facility for loading and executing ECMAScript known as the CommonJS module and package system, and bootstrapping facilities that allow us to initialize and execute CommonJS scripts.</p>
			<p>In this layer several specific subsystems can be defined, depending on the required level of implementation of CommonJS core elements (Module, Package, Context). Those subsystems work together as a sort of Matryoshka doll. The lowest level of implementation of the CommonJS System Layer is the implementation of the Module System. The second level is the use of Packages to group modules in 'package environments' for easy deploy ability and shareability. The last layer is the use of Contexts to be able to implement separate module/package environments in one host </p>
			<p class="EditorNote">Editors Note: The notion of Context is not yet defined or even discussed in the CommonJS group!! Just defined to show how easy it can be to add new functionality to the Core System Layer.</p>
			<p>If we look at implementing those systems we get the following picture:</p>
			<div style="width: 650px; height: 461px; margin: 5px auto 5px auto;" > <a href="Core CommonJS System Layer v0.4.png" target="_new"><img src="Core CommonJS System Layer v0.4.png" width="650" height="461" /></a>
			</div>
			
			<p><b>The CommonJS Context System</b><br />
			In the host at least one (secure) contexts will exist. A context has one (and only one) context environment. A context environment can be seen as a configurable package and its package UID is 'commonjs.org'.

In the host initialization phase at least one context will be defined. The standard configuration of that context environment will be defined in the 'Context' standards.
			The CommonJS Context System performs x main tasks:</p>
			<ol>
				<li>Creates separate module/package environments called context environments</li>
				<li>Makes it possible to switch between contexts</li>
				<li>Can create new context environments</li>
				<li>Can delete a context environment</li>
				<li>Can ??</li>
			</ol>
			<p>The context environment (with UID = 'commonjs.org') has a defined module namespace root. This is the location of which the module identifiers are resolved. This location can be a root in a database, a directory or folder in a file system or a URI to a remote or local location with context environment modules. See the newest Context/x.x specification for more information about the CommonJS Context System.</p>
			
			<p><b>The CommonJS Package System</b><br />
			The CommonJS package system performs x main tasks:</p>
			<ol>
				<li>Maps modules within packages to defined paths</li>
				<li>Stores Package definition files in a local store</li>
				<li>??</li>
			</ol>
			
			<p><b>The CommonJS Module Store System</b><br />
			The CommonJS module system performs x main tasks:</p>
			<ol>
				<li>Provides module Factory Functions and dependency id's from the Module Stores to the core system on request</li>
				<li>??</li>
			</ol>
		
			<p>The relation between the host environment and the four systems are depicted in the next image:</p>
			<div style="width: 650px; height: 395px; margin: 5px auto 5px auto;" > <a href="Relation between Context Package and Module v0.4.png" target="_new"><img src="Relation between Context Package and Module v0.4.png" width="650" height="395" /></a>
			</div>
			
			<p class="EditorNote">Editors Note: add distinction that in the same context environment module exports of the same module in the same package are identical. This is not the case between module exports of the same package in another context environment!! So between context environments only the Factory Function is reused not the created exports!! </p>
			<p><b>The CommonJS Core System</b><br />
The CommonJS Core system performs x main tasks:</p>
			<ol>
				<li>Provide modules to the Module and Host Environments and memoize their exports</li>
				<li>Resolve dependencies between modules and if needed dynamically loads those dependant modules by using generic loader functions</li>
				<li>Allow host scripts to access properties exported from modules which have been provided to the environment </li>
			</ol>
			<p><b>The CommonJS Generic Module Functions</b><br />
The ... performs x main tasks:</p>
			<ol>
				<li>Provides translation functions between local module environment and the Core System Layer (relative to system wide canonical id translation)</li>
				<li>??</li>
			</ol>
<p><b>The CommonJS Generic Loader Functions</b><br />
The ... performs x main tasks:</p>
<ol>
	<li>Resolves dependencies between modules that are loaded and if needed dynamically loads those dependant modules by using the Loader API.</li>
	<li>Calls Module Store System Functions to store loaded module definitions that are memoized by specific loaders</li>
	<li>??</li>
</ol>
<p class="EditorNote">Editors Note: I've put the Registry and Repository store in this system but it could be argued to implement a seperate Registry and Repository System like Context/Package/Module Systems</p>
<p></p>
<p class="EditorNote">Editors Note: The next part of this chapter will be dedicated to describe the Functional requirements and APIs. Please give feedback how to incorporate Functional requirements in this document!! The API description can be better placed in the detailled specifications documents I think</p>
			<p>Functional Requirements:</p>
			<ul>
				<li>Capable of dynamically storing and retrieving of CommonJS modules</li>
				<li>Capable of retrieving of CommonJS modules from a predefined local module store like a file system</li>
				<li>Translating Module Identifiers (relative or rooted) to system wide Canonical Module Identifiers</li>
				<li>Translating Canonical Module Identifiers to URI strings which canonically identify the module resources</li>
			</ul>
			
			<p>API Description:</p>
			<ul>
				<li>require(id) : Accepts a module identifier and returns a module's export</li>
				<li>require.paths : searchable module paths for the generic module store (if available)</li>
				<li>require.id(id) : Accepts a module identifier, returning the corresponding canonical module.id</li>
				<li>require.uri(id) : Accepts a module identifier, returning a URI as a string which canonically identifies the resource</li>
				<li>require.memoize(id, dep array, module factory function) : Accepts a canonical module id, dependency array and a module factory 				function and stores that information in the dynamic module store.</li>
				<li>require.isMemoized(id) : Accepts a canonical module id, returning true if that module is available in the Generic, Dynamic or Active Module Exports store.</li>
			</ul>

			<p>API Interaction:</p>
			<ul>
				<li>The Environment API is injected in the Module Environment via an argument in the Module Factory Function.</li>
			</ul>

			<div class="Subkop">Module Environment Layer</div>
<div style="float:right; overflow:auto; margin: 10px 0px 10px 10px;"><a href="Module Environment Layer v0.4.png" target="_new"><img src="Module Environment Layer v0.4.png" width="200" height="181" longdesc="Module Environment Layer in the Architecture" /></a></div>
			<p>To date,  client side JavaScript has generally been able to get away with something as  simple as the &lt;script&gt; tag and no standard way to do namespaces. On the  server, it's a bit different because you're more likely to use more libraries  and you can potentially load up a lot of code. Having a basic system for  loading code and encouraging the use of namespaces to avoid unintentional  interference will underlie everything else.</p>
			<p>Minimal  requirements:</p>
			<ul>
				<li>Private  module code scope</li>
				<li>Possibility  to export API to other modules</li>
				<li>Facility  to load API&rsquo;s from other modules</li>
				<li>Easy  straightforward module referencing nomenclature</li>
				<li>Declaring  dependencies on other modules by referencing them in export definition state</li>
			</ul>
			<p>A CommonJS module code section (Module Environment) is the  group of expressions contained within a module factory function. Any series of  ECMAScript expressions that can be parsed as an ECMAScript FunctionBody may be used as a module code section.<br />
				CommonJS modules may be stored as any  type of resource, including local files, remote URLs, database entries, and so  on. The storage mechanism of a module is relevant only to the environment&rsquo;s  built-in module provider and not to the defined module itself.</p>
			<p>The module environment has at a minimum access to three APIs</p>
			<ul>
				<li>The require API - The API to the module, package and context providers</li>
				<li>The exports API - The API to the modules exports</li>
				<li>The module API - The API to the generic module and package/module loader functions</li>
			</ul>
			<p>Those three APIs are injected as free variables in the Module Environment via arguments in the Module Factory Function (browser hosts) or via other kind of implementations (scripting hosts).</p>
			
			<div class="Subkop">Specific Loader Functions Layer</div>
<div style="float:right; overflow:auto; margin: 10px 0px 10px 10px;"><a href="Specific Loader Functions Layer v0.4.png"><img src="Specific Loader Functions Layer v0.4.png" width="200" height="181" longdesc="Specific Loader Functions Layer in the Architecture" /></a></div>
			<p>Todo!!<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
			</p>
			<p class="EditorNote">Editors Note: How are Loader Plugins with Specific Loader Functions coupled with the Core CommonJS System (Loader API/Generic Loader Functions). Think of plugins being coupled from within modules or plugins coupled from the extra module environment i.e. basic global script code</p>
			<div class="Subkop">Transport Protocols Layer</div>
<div style="float:right; overflow:auto; margin: 10px 0px 10px 10px;"><a href="Transport Protocols Layer v0.4.png"><img src="Transport Protocols Layer v0.4.png" width="200" height="181" longdesc="Transport Protocols Layer in the Architecture" /></a></div>
			<p>Todo!!<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
			</p>
			
			<p class="EditorNote">Editors Note: Describe some basic Transport Protocols in a high level fashion. Details must be specified in specific Transport specification documents.<br />
			</p>
			<div class="Subkop">
				<p>Glossary</p></div>
			<p class="EditorNote">Editors Note: here all definitions need to be inserted. Please help with definitions!!!<br />
			</p>
<div class="Subkop">References</div>
			<ul>
				<li>Text has been copied from the CommonJS site. <a href="http://commonjs.org/" target="_new">http://www.commonjs.org/</a></li>
			</ul>
			<br />
			<br />
			<div class="EditorNote">
				<p><span class="Subkop">General Article To do:</span></p>
				<p>What needs to be investigated and added to this article:</p>
				<ul>
					<li>Description	of every block as depicted in the overview diagram and a reference to the CommonJS standards describing that block.</li>
					<li>What to do with Module and Package context ??</li>
					<li>Package Manager Functions etc etc</li>
				</ul>
			</div>
		</div>
	   <!-- InstanceEndEditable -->
	</div>
	<div id="Footer">
		<div class="FooterAlgemeen">
			<div class="FooterItem"><a href="/algemeen/algemene voorwaarden">Algemene voorwaarden</a></div>
			<div class="FooterItem"><a href="/algemeen/disclaimer">Disclaimer</a></div>
			<div class="FooterItem"><a href="/algemeen/privacy">Privacy reglement</a></div>
			<div style="clear:both"></div>
		</div>
		<div class="FooterAlgemeen">
			<div class="copyright">(c)1998-2009 SSMT. Last modified:<!-- #BeginDate format:En2m -->07-Feb-2011  14:10<!-- #EndDate --></div>
		</div>
	</div>
</div>
</body>
<!-- InstanceEnd --></html>