-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 06:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locus food ride`
--

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `Combo_ID` int(25) NOT NULL,
  `Combo_Name` varchar(255) NOT NULL,
  `Combo_Image` varchar(255) NOT NULL,
  `Combo_Description` varchar(255) NOT NULL,
  `Combo_Price` double NOT NULL,
  `Restaurant_ID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`Combo_ID`, `Combo_Name`, `Combo_Image`, `Combo_Description`, `Combo_Price`, `Restaurant_ID`) VALUES
(563568, 'Family Fun', 'familyFun.jpg', '1 Large Pan Pizza + 1 Appetizer + 4 Lava Cakes + 1 Coke(1.5 l)', 3000, 3747),
(563569, ' Burger Land Hot Deal', 'BurgerLh.jpg', '1 Crispy Chicken Burger + 1 Whopper+ 2 Small French Fries, 2 Small Soft Drinks\r\n\r\n', 2850, 3746),
(563570, 'Frozen Delights', 'buy1.png', 'Buy your favorite ice cream and get one free (conditions apply)', 400, 3744),
(563571, 'Sea Food Frenzy', 'Fried_Rice_in_Dinner_Food_HD_Photo (1).jpg', '20% off on Sea food Mix on this weekend!!', 1100, 3748);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Comment_ID` int(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Mobile_Number` int(10) NOT NULL,
  `Comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Comment_ID`, `First_Name`, `Last_Name`, `Email_Address`, `Mobile_Number`, `Comments`) VALUES
(1, 'sonal', 'kumara', 'sonal12@gmaill.ocm', 712345678, 'gg'),
(2, 'dulan', 'renuja', 'dulan12@gmaill.ocm', 712345678, 'vsv'),
(3, 'amila', 'nimantha', 'nimantha12@gmaill.ocm', 712345678, 'vadv');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(25) NOT NULL,
  `Customer_Username` varchar(255) NOT NULL,
  `Customer_Password` varchar(255) NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Contact_Number` int(10) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Postal_Code` int(15) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Profile_Image` varchar(255) NOT NULL,
  `Register_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Customer_Username`, `Customer_Password`, `Full_Name`, `Contact_Number`, `Address`, `Postal_Code`, `Date_of_Birth`, `Email`, `Profile_Image`, `Register_Date`) VALUES
(32512, 'toobyuchi', 'apple1b', 'sonaljayawardana', 766419220, '      dfdbdbdgb', 100010, '2020-10-12', 'toobyuchi@gmail.com', 'profile.png', '2020-10-06 14:07:18'),
(32523, 'amajaya123', 'apple123b$', 'Amasha Jayakodi', 766419221, '538 zone 2 Down Hills Colombo 4', 10103, '1999-02-09', 'sonal123326@gmail.com', 'stephanie-liverani-Zz5LQe-VSMY-unsplash (1).jpg', '2020-10-23 06:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_ID` int(10) NOT NULL,
  `Food_Name` varchar(255) NOT NULL,
  `Food_Type` varchar(255) NOT NULL,
  `Food_Description` varchar(255) NOT NULL,
  `Food_Price` double NOT NULL,
  `Food_Image` varchar(255) NOT NULL,
  `Food_Added_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Restaurant_ID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_ID`, `Food_Name`, `Food_Type`, `Food_Description`, `Food_Price`, `Food_Image`, `Food_Added_Date`, `Restaurant_ID`) VALUES
(453365, 'Strawberry Cookie Caramel', 'Dissert', 'Strawberry Ice Cream, Vanilla Wafers, and Caramel Syrup', 400, 'ice1.jpg', '2020-10-22 09:52:05', 3744),
(453366, 'Cookie Doughlicious', 'Dissert', 'Cookie Dough Ice Cream, Heath Bar, Caramel ', 600, 'ice2.jpg', '2020-10-22 09:52:05', 3744),
(453369, 'Verry Vanilla ', 'Dissert', 'Vanilla Syrup, Soda Water, and Vanilla ', 300, 'ice3.jpg', '2020-10-22 10:03:23', 3744),
(453370, 'Coke Float', 'Dissert', 'Coca-Cola and Vanilla Ice Cream', 600, 'ice4.jpg', '2020-10-22 10:03:23', 3744),
(453371, 'Fruitopia', 'Dissert', 'Peach ice cream, Pineapple', 300, 'ice5.jpg', '2020-10-22 10:05:36', 3744),
(453372, 'Oh Fudge We\'re Nuts	 ', 'Dissert', 'Butter Pecan Ice Cream, ', 450, 'ice6.jpg', '2020-10-22 10:05:36', 3744),
(453373, 'Espresso', 'Drinks', 'Locally roasted. Fresh ', 300, 'coffee1.jpeg', '2020-10-22 10:12:15', 3745),
(453374, 'Irish Latte', 'Drinks', 'Crème de Menthe is combined with Baileys ', 600, 'coffee2.jpg', '2020-10-22 10:12:15', 3745),
(453375, 'Mighty Signature Hot Chocolate ', 'Drinks', 'Steamed milk and mocha sauce topped ', 450, 'coffee3.jpg', '2020-10-22 10:12:15', 3744),
(453376, 'Chocolate Cake', ' Dissert', 'Alternating layers of vanilla almond and chocolate', 300, 'coffee4.jpg', '2020-10-22 10:12:15', 3745),
(453377, 'Blueberry Cheese Cake', 'Dissert', 'Sinfully rich & velvety smooth cheesecake made with finest of cream ', 500, 'coffee5.jpg', '2020-10-22 10:12:15', 3745),
(453378, 'Walnut Brownie ', 'Dissert', 'Light with a sprinkle of walnuts', 450, 'coffee6.jpg', '2020-10-22 10:12:15', 3745),
(453379, 'Double whopper', 'Burgers', 'Our double whopper is a pairing of two flame-grilled beef patties topped with    juicy tomatoes, fresh cut lettuce.', 1100, 'doubleWhopper.png', '2020-10-22 10:47:05', 3746),
(453380, 'Cheese & Bacon Tendercrisp', 'Burgers', 'Try our latest Kings Collection addition! Juicy Tendercrisp Chicken Patty made with 100% Inghams Chicken Breast, 2 slices of Cheese, Fresh Lettuce, Tomato, Red Onions', 980, 'baconChedder.jpg', '2020-10-22 10:47:05', 3746),
(453381, 'Crispy Chicken Burger ', 'Burgers', 'A new addition to the chicken family; delicious crispy chicken patty, with crunchy lettuce and mayo in a sesame seed bun.', 880, 'crispy.jpg', '2020-10-22 10:47:05', 3746),
(453382, 'BBQ Bacon Double ', 'Burgers', 'Two signature flame-grilled beef patties topped with 2 slices', 960, 'bbqBacon.jpg', '2020-10-22 10:47:05', 3746),
(453383, 'Junior Salad Burger', 'Burgers', 'Crispy onion rings, lettuce, tomato and cheese with our creamy mayonnaise, all served on a toasted sesame seed bun. ', 550, 'saladb.png', '2020-10-22 10:47:05', 3746),
(453384, 'Double chicken burger ', 'Burgers', 'Two deliciously tender chicken patties, topped with shredded lettuce and creamy mayonnaise all served on a long sesame seed bun. Its double what a chicken burger should be.', 1050, 'doublec.jpg', '2020-10-22 10:47:05', 3746),
(453385, 'HERSHEY\'S Chocolate Pie', 'Dissert', 'Say hello to our HERSHEY\'S Chocolate Pie. One part crunchy chocolate crust and one part chocolate crème filling, garnished with a delicious topping and real HERSHEY\'S Chocolate Chips.', 500, 'chocoP.png', '2020-10-22 10:47:05', 3746),
(453386, 'Devilled Chicken Pizza', 'Pizza', 'Devilled chicken in spicy sauce with a double layer of mozzarella cheese', 1200, 'devilled.jpg', '2020-10-22 11:02:35', 3747),
(453387, 'Chicken Sausage naimiris', 'Pizza', 'A fiery blend of kotchchi chicken sausage meat with nai miris, set upon an all new kotchchi sauce base topped with onion, capsicum and a double layer of mozzarella cheese.', 1100, 'nai.jpg', '2020-10-22 11:02:35', 3747),
(453388, 'Cheese Lovers', 'Pizza', 'Rich tomato sauce with a triple layer of mozzarella cheese.', 960, 'cheese.jpg', '2020-10-22 11:02:35', 3747),
(453389, 'Black Chicken Pizza', 'Pizza', 'A delightfully light thin crust pizza, expertly hand-stretched and oven-baked to golden perfection with flavorsome pieces of black chicken and crunchy onion with a mozzarella cheese', 1150, 'black.jpg', '2020-10-22 11:02:35', 3747),
(453390, 'Mighty Meat - Chicken Pizza ', 'Pizza', 'A delightfully light thin crust pizza, expertly hand-stretched and oven-baked to golden perfection! Topped with a combination of chicken bacon, kotchchi sausage meat, BBQ chicken and spicy chicken, topped with mozzarella cheese.', 1100, 'meat.jpg', '2020-10-22 11:02:35', 3747),
(453391, 'Garlic Bread', 'Appetizers', 'Oven fresh filled with churned onions', 300, 'garlic.jpg', '2020-10-22 11:02:35', 3747),
(453392, 'Chicken Sausage Rolls', 'Appetizers', 'Spicy sausages covered in a crispy film', 200, 'sausage.jpg', '2020-10-22 11:02:35', 3747),
(453393, 'Chocolate Melt Lava Cake', 'Dissert', 'Soft, moist chocolate cake with a burst of thick, hot liquid chocolate inside!', 300, 'lavac.jpg', '2020-10-22 11:02:35', 3747),
(453394, 'Jumbo Coca Cola', 'Drinks', 'More coke to roll!', 250, 'jcoca-cola.jpg', '2020-10-22 11:02:35', 3747),
(453395, 'Jumbo Fanta', 'Drinks', 'More the orangier!', 300, 'jfanta.jpg', '2020-10-22 11:02:35', 3747),
(453396, 'Thai tom yum soup', 'Soup', 'Tom Yum Soup - the BEST Thai Tom Yum Goong recipe youll find online. Loaded with shrimp and mushroom, Tom Yum is spicy, sour, savory, and addictive!', 850, 'tom_yum_soup.jpg', '2020-10-22 14:58:06', 3748),
(453397, 'Chicken and Sweetcorn soup', 'Soup', 'Chicken and sweetcorn soup is full of protein and veggies and its naturally gluten-free, and it is so comforting and delicious.', 755, 'c_sweetcorn.jpg', '2020-10-22 14:58:06', 3749),
(453398, 'Cream of Mushroom Soup', 'Soup', 'A warm bowl of soup is so deliciously creamy with tender bites of mushroom pieces. Full flavored with garlic, onions, and herbs subtle enough to shine through and compliment the natural flavor of mushrooms without overpowering it.', 740, 'cream_of_mushroom.jpg', '2020-10-22 14:58:06', 3748),
(453399, 'Carrot and Orange Soup', 'Soup', 'Carrots have a higher natural sugar content than most other vegetables, making them a popular choice for kids. The sweetness of the carrots, combined with the juice of the orange, makes this Carrot and Orange soup a delicious meal the whole family will en', 680, 'carrot_orange.jpg', '2020-10-22 14:58:06', 3749),
(453400, 'Pot Briyani', 'Rice and Noodles', 'Long-grained rice flavored with fragrant spices such as saffron and layered with lamb, chicken, fish, or vegetables and a thick gravy', 500, 'biryani.jpg', '2020-10-22 15:32:27', 3749),
(453401, 'Sea Food Mixed Rice', 'Rice and Noodles', ' A tasty blend of shrimp, scallops, and calamari with a Chinese touch.', 800, 'sefood.jpg', '2020-10-22 15:32:27', 3748),
(453402, 'Spicy Thai Seafood Crumble', 'Rice and Noodles', 'Fried noodles and scrambled fresh sea food with extra spicy thai sause .', 900, 'seafoodn.jpg', '2020-10-22 15:32:27', 3748),
(453403, 'Nasi goreng', 'Rice and Noodles', 'Delicious spicy stir-fried rice. It\'s more flavourful than regular fried rice with the addition of shrimp paste, fish sauce, tamarind ...', 1100, 'nasi.jpg', '2020-10-22 15:32:27', 3749),
(453404, 'Jumbo Mixed Rice', 'Rice and Noodles', 'There is more and more! Go to choice for all rice fans.', 1500, 'mixed.jpg', '2020-10-22 16:20:22', 3749),
(453405, 'Hoppers with Sambal', 'Appetizers', 'Authentic Sri Lankan dish with spicy katta sambal', 200, 'hoppers.jpg', '2020-10-22 16:20:22', 3749),
(453406, 'Egg Roll', 'Appetizers', 'Chinese-style snack consisting of diced meat and chopped vegetables that are wrapped in an egg-based dough, and then deep-fried in hot oil', 100, 'eggroll.jpg', '2020-10-22 16:20:22', 3748),
(453407, 'Guotie', 'Appetizers', 'The pan-fried variety of the Chinese jiaozi dumpling, known as guotie, is a Northern Chinese dumpling typically filled with minced pork, Chinese cabbage, scallions, ginger, rice wine, and sesame seed oil', 300, 'gotukola.jpg', '2020-10-22 16:20:22', 3748),
(453408, 'Beef Rice and Curry', 'Rice and Noodles', 'Beef Rice and curry', 300, 'pexels-bishop-tamrakar-3926124 (1).jpg', '2020-10-23 14:25:41', 3749);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `key` int(11) NOT NULL,
  `Invoice_ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Invoice_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`key`, `Invoice_ID`, `Item_ID`, `User_ID`, `Restaurant_ID`, `Quantity`, `Invoice_date`) VALUES
(23, 4073370, 453365, 32512, 3744, 1, '2020-10-23 04:58:32'),
(24, 4073370, 453370, 32512, 3744, 1, '2020-10-23 04:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(16) NOT NULL,
  `Item_ID` int(10) NOT NULL,
  `User_ID` int(10) NOT NULL,
  `Restaurant_ID` int(10) NOT NULL,
  `Quantity` int(100) NOT NULL DEFAULT 1,
  `Oder_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int(25) NOT NULL,
  `Card_Type` varchar(255) NOT NULL,
  `Card_Number` int(16) NOT NULL,
  `Card_Holder_Name` varchar(255) NOT NULL,
  `Expired_Date` date NOT NULL,
  `Customer_ID` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Payment_ID`, `Card_Type`, `Card_Number`, `Card_Holder_Name`, `Expired_Date`, `Customer_ID`) VALUES
(45366537, 'VISA', 1626532781, 'Sonal Jayawardana', '2021-05-05', 32523),
(45366546, 'MASTER', 345678345, 'Amasha Jayakodi', '2020-12-16', 32523);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Restaurant_ID` int(25) NOT NULL,
  `Restaurant_Username` varchar(255) NOT NULL,
  `Restaurant_Password` varchar(255) NOT NULL,
  `Restaurant_Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Postal_Code` int(15) NOT NULL,
  `Cuisine_type` varchar(255) NOT NULL,
  `Restaurant_Description` varchar(255) NOT NULL,
  `Contact_number` int(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Logo_Image` varchar(255) NOT NULL,
  `Restaurant_head_img` varchar(255) NOT NULL,
  `Restaurant_img` varchar(255) NOT NULL,
  `Register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`Restaurant_ID`, `Restaurant_Username`, `Restaurant_Password`, `Restaurant_Name`, `Address`, `Postal_Code`, `Cuisine_type`, `Restaurant_Description`, `Contact_number`, `Email`, `Logo_Image`, `Restaurant_head_img`, `Restaurant_img`, `Register_date`) VALUES
(3744, 'HalfPint', 'Halfpint#26', 'Half Pint', '362 Galle Rd, Colombo 06', 10750, 'Ice Cream Shop', 'Since 1945, weve churned out over 1,300 unique and delicious flavors. We have whatever dessert you\'re craving. Celebrate with a scoop, a cone, a sundae, a shake, or a cake!', 112983760, 'halfpintice@gmail.com', 'icelogo.png', 'icetop.jpeg', 'iceinterior.jpg', '2020-10-22 09:49:14'),
(3745, 'MIGHTYMUG', 'CoffeMug@77', ' MIGHTY MUG', ' No. 135, Jawatta Road, Colombo 05. ', 10281, 'Coffee Shop', 'Brewed to perfection.\r\nMighty Mug Colombo is one of the oldest coffee houses in Sri Lanka. Mighty Mug  is well known for emphasizing on serving quality coffee all the time.\r\n', 112556633, 'mightymugcoffee@gmail.com', 'coffeshoplogo.jpg', 'coffeshop2.jpg', 'coffeshop1.jpeg', '2020-10-22 09:49:14'),
(3746, 'BurgerLand', 'EvilGenius$33', 'Burger Land', 'No, 65/3, Galle Rd, Colombo 06', 600, 'American', 'More proof that the best burgers dont have to just be in the big cities. Burger Land now has nine stores since we started back in 2009. Once you’ve seen and tasted one of these bad boys itll be hard to go back to any other type of burger ever again. You', 112546789, 'burgerland24@gmail.com', 'logoB.jpg', 'bheader.jpg', 'bg1.jpg', '2020-10-22 10:37:27'),
(3747, 'PizzaHub', 'postyPipp!00', 'Pizza Hub', 'No,24/5, Hill Street, Colombo 7, Sri Lanka', 700, 'Italian', 'Discover a unique experience\r\nOur pizzas are a combination of many top-quality ingredients balanced with all the right spice in just the right proportions carefully baked in extremely hot ovens. All done under the watchful eye of Oven Fricano.\r\n', 112564322, 'pizzahub@gmail.com', 'pizzalogo.jpg', 'pizzah.jpeg', 'rest2.jpg', '2020-10-22 10:37:27'),
(3748, 'SZECHUAN', 'Chuan@eh55', 'SZECHUAN', ' 811 Kotte Rd, Sri Jayawardenepura Kotte', 49, 'Chinese', 'Want some taste of a dragon?\r\nChina is a most pleasurable Eden of cuisines.Come and enjoy a blend of cinnamon, cloves, Sichuan peppercorns, fennel and star anise, these five spices give the sour, bitter, pungent, sweet and salty flavors exclusively from C', 112878878, 'szechuan@gmail.com', 'chinalogo.jpg', 'chinahead.jpeg', 'rest3.jpg', '2020-10-22 14:32:52'),
(3749, 'CurryLeaf', '#Tygaft88', ' Curry Leaf', 'Sir Chittampalam Gardiner Mawatha, 2 Lotus Rd, Colombo 10', 2712, 'Sri Lankan', 'A village in the heart of the city the Curry Leaf is Colombos most exclusive Sri Lankan restaurant, offering a variety of authentic local fare - String Hoppers, Hoppers, Pittu and Kottu Rotti, to name a few.', 112492492, 'curryleaf@gmail.com', 'curryreslogo.png', 'curryreshead.jpeg', 'rest1.jpg', '2020-10-22 14:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`Combo_ID`),
  ADD KEY `FOREIGN` (`Restaurant_ID`) USING BTREE;

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_ID`),
  ADD KEY `FOREIGN` (`Restaurant_ID`) USING BTREE;

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`key`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `FOREIGN` (`Customer_ID`) USING BTREE;

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `Combo_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563572;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Comment_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32525;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453409;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4353380;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45366548;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Restaurant_ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3752;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `combo`
--
ALTER TABLE `combo`
  ADD CONSTRAINT `combo_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `customer` (`Customer_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurant` (`Restaurant_ID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`Customer_ID`) REFERENCES `customer` (`Customer_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
