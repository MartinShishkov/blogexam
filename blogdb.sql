-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2015 at 12:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogdb`
--
CREATE DATABASE IF NOT EXISTS `blogdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `blogdb`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `body`, `author_name`, `author_email`, `date_created`) VALUES
(1, 41, '&lt;ul&gt; can only contain &lt;li&gt; elements. It''s as simple as that really.\r\n\r\n&lt;ul&gt; is an &quot;Unordered List&quot;, and an &lt;li&gt; is a &quot;List Item&quot;. A list should only contain list items...\r\n\r\nYou may find it is working in your browser, but you shouldn''t keep it that way. Some browsers will auto-correct your error and wrap an &lt;li&gt; around your &lt;a&gt; elements, others will just make it look awful.\r\n\r\nIf you want to correct your code I suggest the following:\r\n\r\n&lt;li&gt;&lt;a href=&quot;https://si.linkedin.com/pub/miha-Å¡uÅ¡terÅ¡iÄ/b2/60/654&quot; class=&quot;profile-icon ion-social-linkedin&quot;&gt;&lt;/a&gt;&lt;/li&gt;\r\n&lt;li&gt;&lt;a href=&quot;https://github.com/Shooshte&quot; class=&quot;profile-icon ion-social-github&quot;&gt;&lt;/a&gt;&lt;/li&gt;', 'anonymous1', 'anon@mail.com', '2015-05-01 13:34:08'),
(2, 41, 'so there''s no way to use anchors like I''m using them? Or do I just need to nest them inside my list tags?', 'Miha Å uÅ¡terÅ¡iÄ', '', '2015-05-01 13:34:41'),
(3, 41, 'I have added a suggestion to fix the code :)', 'anonymous1', '', '2015-05-01 13:35:00'),
(4, 42, 'Stop it while it''s running on a browser? Why would you want to stop it?', 'someuser', '', '2015-05-01 13:44:35'),
(5, 42, 'Due to your scenario, you do some mathematical operations in your view, so this maybe not user friendly choice, you may wait for a long time to see the response.\r\n\r\nThe solution is to use Celery , you can put your time consuming work in the Celery queue, and you can get a quick view response to the frontend, and when the mathematical operations done, use the Celery callback to inform frontend the data is ready, and you can send another request or do something else.', 'anonymous1', '', '2015-05-01 13:44:58'),
(6, 43, 'You should be able to use the JSon.NET NuGet Package for this. The implementation is actually platform-specific [1], but NuGet will transparently take care of that for you and pick the correct one for you.\r\n\r\nNote that you need Mono 3.2.6 and Xamarin.iOS 7.0.6 for this, which just hit the alpha channel this week, I have just fixed some critical bugs in this area. You should also upgrade the NuGet Add-In in Xamarin Studio to the latest version (0.8), which contains several PCL-related bug fixes.\r\n\r\nSimply add the NuGet Add-In to Xamarin Studio if you have not done so already, then search for &quot;JSon.NET&quot;, the add-in will automatically install the package and add the required library references for you.\r\n\r\n[1] The NuGet package contains different .dll''s for different target frameworks and then picks and references the best one for your project - so your application will only contain a single implementation, but an iOS app may use a different one than a desktop application.\r\n\r\nUpdate 01/14/14:\r\n\r\nNuGet packages usually contain different implementations - unfortunately, not all of them will work with Xamarin.iOS due to APIs such as Reflection.Emit or Full DLR that are not available on iOS.\r\n\r\nIf you look into the packages/Newtonsoft.Json.5.0.8/lib/ directory, you''ll see different sub-directories - each of these contain a different implementation and NuGet will use the one that best fits the current target framework. Unfortunately, NuGet does not always pick the right one :-(\r\n\r\nFor Newtonsoft.Json.5.0.8, the &quot;portable-net45+wp80+win8&quot; implementation uses DLR features that are not available on iOS, the &quot;portable-net40+sl4+wp7+win8&quot; one is ok. So if you add the NuGet package to a PCL that''s targeting for instance Profile136, you''ll get the correct implementation.\r\n\r\nThere is no GUI to choose another implementation, but you can edit the .csproj file. Replace\r\n\r\n&lt;Reference Include=&quot;Newtonsoft.Json&quot;&gt;\r\n  &lt;HintPath&gt;..\\packages\\Newtonsoft.Json.5.0.8\\lib\\portable-net45+wp80+win8\\Newtonsoft.Json.dll&lt;/HintPath&gt;\r\n&lt;/Reference&gt;\r\n\r\nwith\r\n\r\n&lt;Reference Include=&quot;Newtonsoft.Json&quot;&gt;\r\n  &lt;HintPath&gt;..\\packages\\Newtonsoft.Json.5.0.8\\lib\\portable-net40+sl4+wp7+win8\\Newtonsoft.Json.dll&lt;/HintPath&gt;\r\n&lt;/Reference&gt;\r\n\r\nand it should work.\r\n\r\nIn general, when you''re getting an error message about missing types after adding a new NuGet package, go to the corresponding package directory and grep -r for that symbol - chances are that there''s a different implementation which does not use this type.\r\n\r\nHopefully, a more elegant solution will be available in the future, but that needs coordination with the NuGet team and package authors, so it''ll take some time.', 'martin', '', '2015-05-01 13:50:39'),
(7, 43, 'Awesome! Will try this shortly. In the mean time I determined that if I reference the &quot;portable40&quot; dll in the Tasky.Core project, and the device-specific dll in the iOS Tasky project, it seems to work. Your way definitely sounds less kludgy so I''ll give it a go in the morning.', 'BalusC', '', '2015-05-01 13:51:05'),
(8, 43, 'So NuGet worked fine for my base &quot;Core&quot; Portable lib, and for the iOS project. Doesn''t work for Android though (I get /Users/Steve/Projects/JSON3/JSON3/MyClass.cs(52,52): Error CS0012: The type System.Object'' is defined in an assembly that is not referenced. Consider adding a reference to assembly System.Runtime, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b03f5f7f11d50a3a'' (CS0012) (JSON3.Android). If I reference the DLL that I downloaded from the Xamarin store, it works however.', 'BalusC', 'balus@mail.com', '2015-05-01 13:51:26'),
(9, 45, 'It is because it changes some class on the carousel items. You can set a min-height to the carousel container (.carousel-inner) and it won''t jump anymore.\r\n\r\nSet the value that fits better your needs.\r\n\r\nALSO: Seam like there is a little effect on the images, so that every time that an image change, it became a bit smaller. If you just want to avoid the all website jump, use what i said above, if you want to change the &quot;change-of-size&quot; behave, you need to check the class .next and (probably) .right/.left and see if there''s a change of height. It is hard to inspect them from a live website, that why i''m telling you to check this from the code - Or upload the code if you prefer.', 'anonymous1', '', '2015-05-01 13:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `date_created`, `visits`) VALUES
(35, 'Why does .NET use banker''s rounding as default?', 'According to the documentation, the decimal.Round method uses a round-to-even algorithm which is not common for most applications. So I always end up writing a custom function to do the more natural round-half-up algorithm:\r\n\r\npublic static decimal RoundHalfUp(this decimal d, int decimals)\r\n{\r\n    if (decimals &lt; 0)\r\n    {\r\n        throw new ArgumentException(&quot;The decimals must be non-negative&quot;, \r\n            &quot;decimals&quot;);\r\n    }\r\n\r\n    decimal multiplier = (decimal)Math.Pow(10, decimals);\r\n    decimal number = d * multiplier;\r\n\r\n    if (decimal.Truncate(number) &lt; number)\r\n    {\r\n        number += 0.5m;\r\n    }\r\n    return decimal.Round(number) / multiplier;\r\n}\r\n\r\nDoes anybody know the reason behind this framework design decision?\r\n\r\nIs there any built-in implementation of the round-half-up algorithm into the framework? Or maybe some unmanaged Windows API?\r\n\r\nIt could be misleading for beginners that simply write decimal.Round(2.5m, 0) expecting 3 as a result but getting 2 instead.', 16, '2015-05-01 13:24:45', 2),
(36, 'Google authorization for an Android application using JavaScript build in Cordova', 'For a school project I''m trying to develop a simple YouTube channel manager but I''m having some difficulties. I''m developing on Cordova, meaning I get to work with HTML and JavaScript (as I''m not a Java fan). What I''m having a problem with is the authorization. I pretty much use the example from Google''s documentation, I tested it as Web Application and it works, then I build the .apk in Cordova, with my keystore, new API key and all that Installed Application stuff that you need from the developers''console, but when I installed in on my phone (HTC One M7) I realized that no dialogue is opened to check for user''s choice of channel. I asked a couple of friends to test it on their phones as well, but the same thing happens. Here''s what I use:\r\n\r\n  function onClientLoad() {\r\n    gapi.client.load(''youtube'', ''v3'', function() {\r\n        gapi.client.load(''youtubeAnalytics'', ''v1'', handleClientLoad); });\r\n  }\r\n\r\n  function handleClientLoad() {\r\n    gapi.client.setApiKey(apiKey);\r\n    window.setTimeout(checkAuth, 1);\r\n  }\r\n\r\n  function checkAuth() {\r\n    gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);\r\n  }\r\n\r\nIs there something I''m doing wrong? Do I need to manually open a dialogue? (And what do I do after?)', 12, '2015-05-01 13:25:51', 2),
(37, 'jQuery - Add classes to different amount of divs', 'I''m new to Stackoverflow and I was wondering if someone can help me with this situation:\r\n\r\nI want to have different blocks(&quot;.item-wrapper&quot;) with items(&quot;.item&quot;) in it. But the item inside the block needs a variable width.\r\n\r\nExample: If the block contains 4 items, the items need a width of 25%.\r\nIf the block contains 5 items, the items need a width of 20%.\r\nIf the block contains 6 items, the items need a width of 16.66....%.\r\nIf the block contains 7 items, the items need a width of 14.28....%.\r\n\r\nI hope someone can help me with this.\r\n\r\nHere do I have a JSfiddle\r\n\r\njsfiddle.net/carloc/4cjwqpf4/2/\r\n\r\nThank you!', 11, '2015-05-01 13:27:47', 2),
(38, 'How to stop outer block from inner block', 'I try to implement search function which looks for occurrence for particular keyword, but if --max options is provided it will print only some particular number of lines.\r\n\r\ndef search_in_file(path_to_file, keyword)\r\n  seen = false\r\n  File::open(path_to_file) do |f|\r\n    f.each_with_index do |line, i|\r\n      if line.include? keyword\r\n\r\n        # print path to file before only if there occurence of keyword in a file\r\n        unless  seen\r\n          puts path_to_file.to_s.blue\r\n          seen = true\r\n        end\r\n\r\n        # print colored line\r\n        puts &quot;#{i+1}:&quot;.bold.gray + &quot;#{line}&quot;.sub(keyword, keyword.bg_red)\r\n\r\n\r\n        break if i == @opt[:max]  # PROBLEM WITH THIS!!! \r\n\r\n      end\r\n    end\r\n  end\r\n  puts &quot;&quot; if seen\r\nend\r\n\r\nI try to use break statement, but when it''s within if ... end block I can''t break out from outer each_with_index block.\r\n\r\nIf I move break outside if ... end it works, but it''s not what I want.\r\n\r\nHow I can deal with this?\r\n\r\nThanks in advance.', 11, '2015-05-01 13:28:59', 1),
(39, 'RSpec - how to test a class including HTTParty', 'I have a code like this:\r\n\r\nclass FooBar\r\n  include HTTParty\r\n\r\n  def self.token\r\n    fail Project::MissingToken unless Project::Config.key?(&quot;project_token&quot;)\r\n    Project::Config.fetch(&quot;project_token&quot;)\r\n  end\r\n\r\n  base_uri &quot;https://website.com/api&quot;\r\n  default_params token: token\r\nend\r\n\r\nNow I need to test a case when Project::Config doesn''t contain the key and raises the exception. I was considering something like that:\r\n\r\ncontext &quot;token is not given&quot; do\r\n  subject { Project::FooBar }\r\n\r\n  it &quot;should raise an error&quot; do\r\n    expect(Project::Config).to receive(:key?).with(&quot;project_token&quot;).and_return(false)\r\n    expect { subject }.to raise_error(Project::MissingToken)\r\n  end\r\nend', 11, '2015-05-01 13:29:47', 1),
(40, 'bootsprap 2.1 modal autofocus not working', 'ISSUE : Auto focus is not applying to my pop up form of bootstrap 2.1\r\n\r\nI am using twitter bootstrap 2.1 trying to autofocus on first input element when click and a pop up is show.\r\n\r\nI need guidance to resolve this issue. I have try with JavaScript focus function and also try with html autofocus property but it is not applying.\r\n\r\nBootstrap modal show event\r\n\r\nI tried this stack overflow question but it require to update my bootstrap to 3.0 but it is not possible for me to update as it require huge time.\r\n\r\nI want similar autofocus with bootstrap 2.1 please guide me towards this.\r\n\r\nThanks in advance', 13, '2015-05-01 13:31:01', 6),
(41, 'w3 html5 validation, anchor not allowed as child of ul', 'when I validate my html on w3 validation I get the following error Element a not allowed as child of element ul in this context. (Suppressing further errors from this subtree.) . The site is displaying properly (and the anchor is working) on my phone, tablet and desktop, and I don''t really understand this error message. Can somebody tell me what I did wrong and how to do this properly?\r\n\r\nHere''s the part of the code that produces the error:\r\n\r\n&lt;section id=&quot;skills&quot;&gt;\r\n    &lt;div class=&quot;skills-header&quot;&gt;\r\n        &lt;p&gt;Pozdravljen Svet! PiÅ¡em lahko:&lt;/p&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;skills-container&quot;&gt;\r\n        &lt;ul&gt;\r\n            &lt;li&gt;&lt; html5 &gt;&lt;/li&gt;\r\n            &lt;li&gt; { css3 }&lt;/li&gt;\r\n            &lt;li&gt;javascript.js&lt;/li&gt;\r\n            &lt;li class=&quot;break&quot;&gt;$(jQuery)&lt;/li&gt;\r\n            &lt;li class=&quot;break&quot;&gt;&lt;%= rails 4 %&gt;&lt;/li&gt;\r\n            &lt;li class=&quot;break&quot;&gt;&lt; div class=&quot;bootstrap&quot; &gt;&lt;/li&gt;\r\n            &lt;li class=&quot;break&quot;&gt;$ sudo apt-get update&lt;/li&gt;\r\n            &lt;a href=&quot;https://si.linkedin.com/pub/miha-Å¡uÅ¡terÅ¡iÄ/b2/60/654&quot;&gt;&lt;li class=&quot;profile-icon ion-social-linkedin&quot;&gt;&lt;/li&gt;&lt;/a&gt;\r\n            &lt;a href=&quot;https://github.com/Shooshte&quot;&gt;&lt;li class=&quot;profile-icon ion-social-github&quot;&gt;&lt;/li&gt;&lt;/a&gt;\r\n        &lt;/ul&gt;\r\n    &lt;/div&gt;\r\n&lt;/section&gt;', 13, '2015-05-01 13:32:44', 4),
(42, 'How to stop a Django View while it is executing?', 'I have a Django &quot;view&quot; which does some mathematical operation over large data sets. I takes about 20 seconds(on localserver) for the view to complete the execution.\r\n\r\nAfter the execution, I return a Django template as a response to the request received. I want to know if there is a way I can stop the execution of the view maybe by using another request, or by any other means.', 14, '2015-05-01 13:44:00', 5),
(43, 'Xamarin + JSON.Net', 'I''m having trouble understanding why the Newtonsoft JSON parser has to be device specific under Xamarin. I cannot seem to find any way to have the parser exist in a common, shared library. I''m using the Tasky Pro sample app. I can get the JSON.Net DLLs from the Xamarin store to work in the Android and iOS projects, however that makes no architecural sense. E.g., the SQLite stuff is all in a shared lib, as you''d expect - as one set of c# source files.\r\n\r\nIdeally I''d like to just add some kind of reference to &quot;Tasky.Core&quot; and be able to serialize/deserialize JSON.\r\n\r\nIs there any way to get JSON.Net to work in a shared library (across droid/ios/wp8)? The source is pretty huge to try to manage as linked files, if that''s even possible...\r\n\r\nIf not, is there some alternative way of managing JSON that will work in this way?', 15, '2015-05-01 13:49:25', 6),
(44, 'knockoutjs refresh or update', 'I trying create a ajax-refresh shopping-cart panel. My shopping-cart is listed but I can''t refresh it in $.getJSON callback function. my view and code is;\r\n\r\n&lt;div class=&quot;panel panel-info&quot;&gt;\r\n    &lt;div class=&quot;panel-heading&quot;&gt;\r\n        &lt;i class=&quot;fa fa-list-ul&quot;&gt;&lt;/i&gt; SipariÅŸ Listeniz\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;panel-body&quot;&gt;\r\n        &lt;div id=&quot;cart&quot; data-bind=&quot;foreach: Currencies&quot;&gt;\r\n            &lt;div class=&quot;&quot;&gt;\r\n                &lt;span data-bind=&quot;text: Currency&quot;&gt;&lt;/span&gt;\r\n                &lt;table class=&quot; table table-striped&quot; data-bind=&quot;foreach: Items&quot;&gt;\r\n                    &lt;tr&gt;\r\n                        &lt;td data-bind=&quot;text: Code&quot;&gt;&lt;/td&gt;\r\n                        &lt;td data-bind=&quot;text: Amount&quot;&gt;&lt;/td&gt;\r\n                        &lt;td data-bind=&quot;text: Price&quot;&gt;&lt;/td&gt;\r\n                        &lt;td data-bind=&quot;text: LineTotal&quot;&gt;&lt;/td&gt;\r\n                    &lt;/tr&gt;\r\n                &lt;/table&gt;\r\n            &lt;/div&gt;\r\n        &lt;/div&gt;\r\n    &lt;/div&gt;\r\n    &lt;div class=&quot;panel-footer&quot;&gt;\r\n    &lt;/div&gt;\r\n&lt;/div&gt;\r\n\r\nand\r\n\r\nvar cartViewModel = {\r\n    Currencies: ko.observableArray()\r\n};\r\n\r\n$(function () {\r\n    ShowCart();\r\n});\r\n\r\nfunction AddToCart(i, a) {\r\n    $.getJSON(''@Url.Action(&quot;AddToCart&quot;, &quot;Products&quot;)/'' + i + ''?Amount='' + a, null, function (d) {\r\n        if (d)\r\n            ShowCart();\r\n    });\r\n}\r\nfunction ShowCart() {\r\n    $.getJSON(''@Url.Action(&quot;GetCart&quot;,&quot;Products&quot;)'', null, function (c) {\r\n        cartViewModel.Currencies = ko.observableArray(c);\r\n        cartViewModel.Currencies.valueHasMutated();\r\n        ko.applyBindings(cartViewModel);\r\n    });\r\n}\r\n\r\nHow can I refresh the binding in the $.getJSON callback?', 11, '2015-05-01 13:53:40', 1),
(45, 'Bootstrap Carousel - Whole website jumps when image is changing', 'Hey lovely Blog System Community.\r\n\r\nI have a problem with my website. I added the Bootstrap Carousel from getbootrap.com and it actually works very well. But there is one problem. Everytime the image sitch, my whole website goes up and down.\r\n\r\nenter link description here\r\n\r\nI don''t know what could be the problem, cause i changed nothing on the code from getbootstrap.com :-/\r\n\r\nSorry for my bad english :D Hope you can understand my problem.', 12, '2015-05-01 13:55:26', 2),
(46, '[Technical Issue] Angular js + Jquery', 'Ð—Ð´Ñ€Ð°Ð²ÐµÐ¹Ñ‚Ðµ, Ð¸ÑÐºÐ°Ð¼ Ð´Ð° Ð·Ð°Ð¿Ð¸Ñ‚Ð°Ð¼ ÐºÐ°Ðº Ð´Ð° Ð·Ð°Ñ€ÐµÐ´Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸Ñ‚Ðµ Ð½Ð° jquery ÑÐ»ÐµÐ´ Ð´Ð¸Ð½Ð°Ð¼Ð¸Ñ‡Ð½Ð¾Ñ‚Ð¾ Ð·Ð°Ñ€ÐµÐ¶Ð´Ð°Ð½Ðµ Ð½Ð° angular? ÐŸÑ€Ð¸Ð¼ÐµÑ€: Ð¿Ñ€Ð¾ÑÑ‚Ð¸ jquery Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸ Ð¾Ñ‚ Ñ€Ð¾Ð´Ð° Ð½Ð° Ð°Ð»ÐµÑ€Ñ‚ Ð½Ðµ Ñ€Ð°Ð±Ð¾Ñ‚ÑÑ‚ ÐºÐ¾Ð³Ð°Ñ‚ ÑÐ° Ð² ng-repeat Ñ†Ð¸ÐºÑŠÐ». Ð˜Ð·Ð²Ð¾Ð´Ð° Ð¼Ð¸ Ðµ, Ñ‡Ðµ jquery Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¸Ñ‚Ðµ Ñ‚Ñ€ÑÐ±Ð²Ð° Ð´Ð° ÑÐµ Ð·Ð°Ñ€Ð´ÑÑ‚ ÑÐ»ÐµÐ´ ÐºÐ°Ñ‚Ð¾ Ð°Ð½Ð³ÑƒÐ»Ð°Ñ€ Ð¾Ð±Ñ…Ð¾Ð´Ð¸ ÐºÐ¾Ð´Ð° Ð¸ Ð·Ð°Ð´Ð°Ð´Ðµ ÐºÐ»Ð°ÑÐ¾Ð²Ðµ, Ð½Ð¾ Ð½ÐµÐ·Ð½Ð°Ð¼ ÐºÐ°Ðº Ð´Ð° Ð³Ð¾ Ð½Ð°Ð¿Ñ€ÑÐ²Ñ.\r\n\r\nÐÐºÐ¾ Ð½ÑÐºÐ¾Ð¹ Ð¶ÐµÐ»Ð°Ðµ Ð´Ð° Ð¿Ð¾Ð¼Ð¾Ð³Ð½Ðµ, Ñ‰Ðµ ÑÑŠÐ¼ Ð¸Ð·ÐºÐ»ÑŽÑ‡Ð¸Ñ‚ÐµÐ»Ð½Ð¾ Ð±Ð»Ð°Ð³Ð¾Ð´Ð°Ñ€Ð½Ð°!', 12, '2015-05-01 13:57:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
CREATE TABLE IF NOT EXISTS `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`post_id`, `tag_id`) VALUES
(36, 5),
(37, 8),
(37, 15),
(37, 16),
(38, 17),
(38, 3),
(39, 17),
(39, 3),
(40, 8),
(40, 21),
(40, 15),
(41, 16),
(41, 3),
(42, 8),
(42, 15),
(42, 19),
(42, 11),
(43, 13),
(43, 18),
(43, 2),
(44, 22),
(44, 23),
(45, 21),
(45, 8),
(45, 15),
(46, 8),
(46, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'php'),
(2, 'C#'),
(3, 'stack-overflow'),
(4, 'lorem-ipsum'),
(5, 'android'),
(6, 'cats'),
(7, 'mysql'),
(8, 'jquery'),
(9, 'asp.net'),
(10, 'mvc'),
(11, 'web-api'),
(12, 'query'),
(13, 'xamarin'),
(14, 'softuni'),
(15, 'HTML5'),
(16, 'CSS3'),
(17, 'ruby'),
(18, 'json'),
(19, 'django'),
(20, 'angularjs'),
(21, 'bootstrap'),
(22, 'ajax'),
(23, 'knockoutjs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passwordHash` varchar(1024) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwordHash`) VALUES
(11, 'martin', '$2y$10$7QTUO6z3JmWr0BCkXR7Qbelp2IynF9LAhO34PNrNAO8eKFg.oDcDO'),
(12, 'maria', '$2y$10$OLAthQu/LcbNLG2szgDvzeFqVrwfTnVAUOXLu7Q30jpz6iPrJ5hra'),
(13, 'Jon Skeet', '$2y$10$avo1uIgoHRa8xh5DA6JiCukghI0JYZmLDUB/HTAjtuwSJQN8cwNpO'),
(14, 'pesho', '$2y$10$V/ZDrj2hElyTAfsnMSY38exTDdioKXfWAbtKiDBOjxOM2jOW0RyIS'),
(15, 'BalusC', '$2y$10$I3YWQzavusKMFqIM7n51v.iaqgaX26Fkpekp3ZWazQAXvic.Mk3VK'),
(16, 'Darin Dimitrov', '$2y$10$lWj1edJZh2V5Rv/AIhrIgefQvF.FJy6VhsgsCdCDPd066EH12ra/e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_comments_posts1_idx` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_posts_users_idx` (`user_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
 ADD KEY `fk_posts_tags_posts1_idx` (`post_id`), ADD KEY `fk_posts_tags_tags1_idx` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_comments_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
ADD CONSTRAINT `fk_posts_tags_posts1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_posts_tags_tags1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
