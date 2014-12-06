USE `octagon`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (i686)
--
-- Host: db4free.net    Database: octagon
-- ------------------------------------------------------
-- Server version	5.6.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` VALUES (1,'NIKE',1,NULL),(2,'ADIDAS',1,NULL),(3,'ASICS',1,NULL),(4,'REEBOK',1,NULL);

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` VALUES (1,'The Kobe 9 Elite is definitely in a league of it\'s own. A lot of people will be skeptical of the weight of the shoe, but to say the least, it is a non-issue.\nThe flyknit/fuse based mesh wraps the foot quite well, and also the lunar insole really molds to your foot to make the basis of comfort to the max.\nI do suggest this as an indoor shoe only, but it\'s traction is the best. Minus the subject to minor dead-space around the forefoot area, but it\'s quite a non-issue when your on the run around the court w/ a lot of lateral movement. Overall - Great sneaker, for the ultimate competitor.\n','2014-10-30',132,123,NULL),(2,'I have used the Hyperdunk 2011 Elite, 2012, 2013 and recently the 2014 models and I can conclusively say the Hyperdunk 2014 is the best model so far. The shoe is wider which is important for me as most Asians have wider feet. The cushioning feels better especially in the heel. I think it\'s because the Lunarlon seems to be thicker. I\'ve used it for basketball 3 times already and I love it. I play on an outdoor court but traction was never an issue. What I also love about this shoe is that there is no break-in period. The first time I wore it, it felt great and was good to go.','2014-11-13',134,NULL,11002),(3,'I\'m a big guy and loved the support that they offered. The 12s brought me back to playing in lebrons. I had been using kobe 9s because they felt great, but they always left my knees hurting at the end of a session. With the 12s the fit is amazing. Takes a few games to break in, but cushioning is on point. I left the gym after a 2 hour session feeling amazing. super comfortable, even for the bigger players like myself.','2014-11-23',133,124,NULL),(4,'No problems with the KD 7 shoe, great walking shoe and everyday wear shoe. Pros: lightweight, cool colors, durable, easy to clean.','2014-09-18',136,NULL,11004),(5,'I\'ve always liked foamposites and this shoe didn\'t disappointment. The quality is top notch and they are very comfortable. Can run a tad bit narrow but the more you wear them, the more they will break in to your foot. The design is definitely an eye catcher also.','2014-11-23',135,NULL,11005),(6,'i just got these boots a few days ago and love them! Haven t gotten on blister and no foot pain. only bad part is they already have a holy in the cleat(Adidas is sending me new ones). don\'t know if my pair was messed up or if these cant hold up to a high school soccer practice. Feel grate and work amazing. great choice!','2014-08-17',137,NULL,22001),(7,'These new boots are well-suited for me because they’re elegant, beautiful, and they really shine in a new and different way.','2014-08-13',145,NULL,21001),(8,'I don\'t want to offend anyone but these boots look like a kid designed it. ','2014-06-15',136,NULL,22002),(9,'It is great.Youth and kids might think that crazy is cool but my honest opinion is that some of the older generations buying those ones must be real crazylights in their heads to go for this boots.','2014-09-10',132,NULL,21002),(10,'This shoe is a nice light weight woven runner. I wouldn\'t go running in it but I would suggest it to anyone looking for ZX Flux. I personally like these more than the nylon graphic ones. These shoes do run a little narrow in the arc.','2014-10-12',124,NULL,32001),(11,'The Asics Gel-Kayano 20 shoe is the best shoe on the market. It is the most comfortable shoe. I have had some very serious injuries to my heels. This shoe allows me to workout with great support and cushion for my injuries.','2014-10-10',111,NULL,33001),(12,'I have worn this style of shoe for at least 25 years. I wear them with inserts for my plantar fascia tis. THESES SHOES NO LONGER FIT. THEY ARE TOO NARROW. Apparently the new country making them makes them smaller.','2014-12-01',133,NULL,34001);

--
-- Dumping data for table `Mailbox`
--

INSERT INTO `Mailbox` VALUES (999,'My shoe is hot','Please get these shoes for winter they shall melt the snow','2014-12-17',111,123,0,0,0),(1000,'Alex gives away Usain Bolt\'s shoes','Alex bought Usain Bolt\'s shoes for $ 1,258,33768.00 calling the colossal sum pocket change and handed the shoes over to a barefooted schoolboy and gave ten times the amount for the building of a state of the art university in Accra, Ghana','2014-12-11',124,136,1,0,0),(1001,'Mobile Phone Enabled Boots','Answer your phone call by tapping ur feet','2014-12-18',132,111,1,1,1),(1002,'Developer boots','All developers muat buy these','2014-12-17',136,132,0,0,1),(1003,'Shoe Auction','Auctioning Jiang Gao\'s shoes, starting price $500','2014-12-19',136,123,1,0,0),(1004,'Adidas to distribute shoes for free','Adidas co-chairman announces the distribution of 10,000 shoes this Christmas to schoolchildren in Calcutta India ','2014-12-14',133,124,1,1,0),(1005,'Muhammad Ali\'s boxing shoes found','Have you heard? Muhammad Ali\'s long-lost boxing shoes have been found in the Sahara desert','2014-12-10',124,123,1,0,0);

--
-- Dumping data for table `Newsfeed`
--

INSERT INTO `Newsfeed` VALUES (1,'AIR JORDAN 4LAB1 “GLOW” – RELEASE DATE','A brand new colorway of the Air Jordan 4Lab1 is headed our way right before the new year, as this “Glow” look arrives at retailers on December 31st, 2014. Fresh off of that Tropical Teal release that continues the Elements Series by introducing us to the all mesh Air Jordan 4 referencing Air Jordan 1, the shoe ditches the vibrance of the last pair for a subtle white look. An icy outsole adds a clean finish, but we’re still waiting to see what this pair looks like once the lights are turned off. Check out more of the latest Air Jordan 4Lab1 after the break and be sure to stay tuned for more Jordan Release Dates right here on Sneaker News.','2014-12-03',1,123),(2,'NIKE KOBE 9 EXT “BLACK” – RELEASE DATE','The Snakeskin offering won’t be the only Nike Kobe 9 EXT to release late this year, as a new black pair popped up recently and will be arriving on December 13th, 2014. From the looks of things, this premium lifestyle themed Kobe 9returns to Flyknit while premium leather flanks the tongue and ankle support to contrast those reflective panels replacing the normal carbon fiber on the midsole. What do you think of the ominous take on the Nike Kobe 9?updates right here on Sneaker News.','2014-12-01',2,124),(3,'NIKE LEBRON 12 “GALAXY DUNK FORCE” CUSTOMS','The ‘Dunkman’ goes to infinity and beyond with this latest custom of the LeBron’s latest signature by Sneaker Smart Customs, the Nike LeBron 12 “Galaxy Dunk Force”. This amalgamation of iconic Nike Basketball colorway motifs combines LeBron’s yearly Dunkman colorway with the always sought after Galaxy theme in a clean and effective way. Sticking with the regular Dunkman base, Sneaker Smart Customs simply adds a celectial pattern to the Hyperposite support of each shoe. If you like what you see here, check out more of Sneaker Smart’s work on his Instagram.','2014-11-29',3,134),(4,'THE AIR JORDAN 11 “LEGEND BLUE” WILL RETAIL FOR $200','We recently ran down the list of the 23 most expensive Air Jordans to hit retail, but it looks like one pair will have be removed in favor of the Air Jordan 11 “Legend Blue”. This December 20th release will indeed retail for $200, as confirmed by Jordan Brand. These highly-coveted sneakers will be accompanied by matching a Jordan Sportswear apparel capsule, decorated with the Legend Blue palette and a graphic inspired by the iconic 23 type on the heel. Get a look at the Legend Blue 11 and the full collection here courtesy of the Jordan Holiday 2014 Catalog by Eastbay and let us know what your thoughts are about the retail price.','2014-11-19',4,137);

--
-- Dumping data for table `Rating`
--

INSERT INTO `Rating` VALUES (1,5,NULL,123,132),(2,5,NULL,123,134),(3,4,NULL,124,133),(4,5,11004,NULL,136),(5,4,11005,NULL,135),(6,5,21001,NULL,137),(7,5,21002,NULL,145),(8,5,22001,NULL,136),(9,4,22002,NULL,132),(10,5,32001,NULL,124),(11,5,33001,NULL,111),(12,5,34001,NULL,133);

--
-- Dumping data for table `Shoe`
--

INSERT INTO `Shoe` VALUES (11001,'Nike Kobe IX High','\nSequoia/Rough Green/Hyper Crimson/Silver\n',44.0,'The KOBE 9 Elite redefines the aesthetics and performance of a basketball shoe and was designed using Nike Flyknit according to Nike’s “Nature Amplified” design ethos, an approach focused on designing for the body in motion and fueled by scientific data and athlete insights.','Nike',195.99,'Kobe.Bryant',2014,'THE MASTERPIECE','jpg',1,123),(11002,'Nike Hyperdunk 2014\n','\nCollege Navy/University Gold/Wolf Grey\n',45.0,'One of the elite performance basketball shoes just got even better; built for quickness in the open floor, explosive jumping around the rim, and comfort that will keep your feet fresh through the final whistle.\nUpdated Lunarlon cushioning system for a lighter, more responsive ride.\nHyperfuse construction upper for breathability and flexibility.\nDynamic collar foam, dynamic Flywire technology, and a flexible U-throat opening provide comfort, protection, and lockdown while promoting natural motion for elite players who command top performance.\nMolded heel counter for lockdown.\nSolid rubber outsole with herringbone traction pattern for performance.\n','Nike',119.99,'Paul.George',2014,'Elite','1',1,123),(11003,'Nike Lebron 12 \n','Hyper Turquoise/Metallic Cool Grey/Hyper Crimson',44.0,'the best player in the game deserves the best shoe in the game, and so do you. Prepare to dominate in the shoe LeBron uses to win on the court.\n\nHyperfuse construction upper for lightweight, breathable support.\nBreathable, one-piece bootie fits snugly against your foot to provide secure support as you cut on the court.\nFlywire cables lock down your foot during quick, explosive movements to provide the stable base you need to be your most athletic.\nHyperposite wings for targeted support and protection.\nIndependent Nike Zoom midsole units for flexible cushioning, so you land softly and safely.\nTranslucent rubber outsole for traction that allows you to explode in and out of your cuts.\n','Nike',95.99,'Lebron.James\n',2014,'New Issue','1',1,124),(11004,'\nNike KD 7\n','\n Bright Mango/Light Magnet Grey/Volt/Space Blue\n',44.5,'Inspired by Kevin Durant\'s supernatural game, the low-top KD VII frees the foot while its cushioning and lightweight supportive sidewalls lock you down.\nMesh forefoot provides a lightweight, flexible fit.\nMidfoot strap with hook-and-loop closure provides secure lockdown.\nVisible Nike Air-Sole® unit in heel provides crash protection.\nRubber Phylon™ outsole with flex grooves allow the shoe to move naturally with your foot\n','Nike',59.99,'\nKevin.durant\n',2014,'New Issue','1',1,132),(11005,'Nike Air Foamposite One\n','Black/Game Royal/White\n',45.0,'The Nike Air Foamposite One LE is a retro version of the original Foamposite One colorway made popular by basketball star Penny Hardaway. It\'s a sleek and innovative design that\'s packed with just enough technology to keep hoops players light on their feet and quick in their cuts on the court. The Foamposite upper uses synthetic foam that molds to the shape of your foot, offering a fit like no other. It also features a carbon fiber plate, Zoom Air™ unit, Penny\'s \"One Cent\" logo and a translucent rubber sole. ','Nike',183.99,'\nAnfernee Hardaway\n',2014,'New Issue','1',1,132),(21001,'Nike Mercurial Superfly CR7','Black',43.5,'The first proper signature CR7 model to launch on the new Mercurial Superfly, the Cristiano’s new football boots are designed to put a new twist on a classic style with these black and white efforts from the Swoosh.\n','Nike',199.99,'Cristiano Ronaldo',2014,'new issue',NULL,1,135),(21002,'\nNIKE HYPERVENOM PHANTOM FIRM GROUND \n','orange',44.5,'Fit\nNikeSkin technology fits closer to your foot for more natural touch. The one-piece upper design eliminates unnecessary layers-using only thin PU film and performance mesh-to reduce weight and bring your feet closer to the ball.\n\nTouch\nA revolutionary 3-D textured upper with All Conditions Control (ACC) technology helps you grip the ball for optimal control in both wet or dry weather.\n\nTraction\nThe split-toe plate and agility traction pattern deliver a quick response to help you find space when defenders close in. The stud shapes and pattern are designed for sudden changes of direction with faster release and maximum response. A forefoot groove unleashes fierce toe-off speed for faster sprints.\n','Nike',184.99,'Wayne Rooney',2013,NULL,NULL,1,137),(22001,'F50i','Cyan / White / Running Black',44.0,'printskin is a revolutionary single-layer synthetic for incredible ball feel and reduced weight. Innovative lace cover for optimal fit and increased kicking area.\nLining: Synthetic.\nInlay: New exchangeable pre-moulded TUNiT standard insock for premium support and cushioning.\nOutsole: Traxion FG for grip and comfort on firm natural surfaces. Comes with additional SG and HG studs.\n','Adidas',194.99,'Lionel Messi ',2009,NULL,NULL,2,134),(22002,'Adidas f50 Crazylight\n','solar green ',44.0,'Light, bright and built for speed, these men\'s soccer cleats are made for firm-ground performance. Featuring an ultra-light synthetic upper, they weigh a feathery 130 grams, with a bold reflective outsole and bright styling that will stun the competition as you blaze past them and leave them frozen on the pitch.\nInnovative synthetic upper for light weight and perfect touch\nContrast upper blocking for more player visibility\nHigh-tech aerodynamic outsole patterns for best air flow\nThe SPRINTFRAME construction uses geometrical research and a new stud configuration to offer the perfect balance between light weight and stability\nTRAXION™ FG outsole for grip and comfort on firm, natural surfaces; Ultralight Pebax material for lightest weight\nImported\n','Adidas',189.99,'Gareth Bale',2014,'new issue',NULL,2,136),(32001,'Originals ZX Flux','blue/white/silvery',43.0,'Simple and modern, the adidas Originals ZX Flux is a descendent of the iconic ZX 8000 running shoe.\nOne-piece mesh upper is incredibly comfortable and supportive with welded TPU 3-Stripes®.\nTPU heel counter echoes the iconic ZX thousands series, and adds exceptional support to your feet mile after mile.\n','ADIDAS',96.99,'Beckham',2012,NULL,NULL,2,145),(33001,' Gel - Kayano 20','silver and blue',45.0,'Celebrate the legendary GEL-Kayano series\' 20th anniversary in style with the ASICS® GEL-Kayano® 20. Designed for overpronators seeking exceptional support and cushioning, this performance running shoe features new technologies that are sure to keep your feet comfortable. The FluidRide midsole combines responsive bounce back with cloud-like cushioning, allowing a soft and smooth ride. FluidFit upper technology utilizes multidirectional stretch mesh that adapts to your foot, creating a true glove-like fit.','ASICS',87.99,'Yuanhao Yao',2012,NULL,NULL,3,124),(34001,'Classic Nylon','\nblack/white\n',44.0,'\nThe Reebok Classic Nylon will be your next pair of go-to kicks for everyday wear. These casual shoes feature a combination suede and nylon upper for breathability, lightly padded collar and tongue for support, textile lining with padded foam sockliner for added comfort, EVA midsole for lightweight cushioning and a high-abrasion rubber outsole for traction and durability. Non-removable insole\n','Reebok',43.99,'\nAllen Iverson\n',2014,NULL,NULL,4,134);

--
-- Dumping data for table `Statistics`
--

INSERT INTO `Statistics` VALUES (1,'Nike kobe Masterpieces 9 get good feedback','Between November to December,the protal exchanged nike kobe Masterpieces 9 a total of 48 pairs of nike shoes, including 46 people like the shoes, the satisfaction is up to 95% .',1),(2,'Adidas f50 Crazylight is unpopular ','The shoes is unpopular Only 18 people like it. And they do not want to exchange for this shoe.',2),(3,'Gel - Kayano 20 has normal performance','There are 45 people own Gel - Kayano 20 and they want to ues this to exchange other shoes.',3),(4,'Classic Nylon has large demand','From November to December. there are a great number of people about 294 persion want to get this shoes. ',4);

--
-- Dumping data for table `User`
--

INSERT INTO `User` VALUES (111,'user8','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=',NULL,'ssss@gmail.com',NULL,NULL,NULL),(123,'user1','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Street 1, Karlskrona, Sweeden','user1@mail.se','png',0,NULL),(124,'user7','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=',NULL,'fssdf@gmail.com',NULL,NULL,NULL),(132,'user2','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Street 2, Karlskrona, Sweeden','user2@mail.se','png',0,NULL),(133,'user3','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Street 3, Karlskrona, Sweeden','user3@mail.se','png',0,NULL),(134,'user4','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Street 4, Karlskrona, Sweeden','user4@mail.se','png',0,NULL),(135,'user5','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Street 5, Karlskrona, Sweeden','user5@mail.se','png',0,NULL),(136,'admin1','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Admin Street 1, Karlskrona, Sweeden','admin1@mail.se','png',1,NULL),(137,'buser1','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=','Blocked Street 1, Karlskrona, Sweeden','block1@mail.se','png',0,'2029-01-01'),(145,'user6','jZae727K08KaOmKSgOaGzww/XVqGr/PKEgIMkjrcbJI=',NULL,'kkidfh@gmail.com',NULL,NULL,NULL);
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
