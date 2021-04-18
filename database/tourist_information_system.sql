-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2021 at 01:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(3, 'Wrik Das', 'wrikdas22@gmail.com', '$2y$10$ElqXCLi92p2Gk3/L0n2cPepkNVCoTKTsJJk6WjLBrSMa8TyoIl6g2'),
(4, 'Pourab Roy', 'pourab@gmail.com', '$2y$10$NrRCStMnrfx0J.A0yC.ELePq8Awp6kCdAkZmFS2z6HyCoUkWO/erG');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cover` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `cover`) VALUES
(2, 'Dooars', 'Elephants! Rhinos!! Safari!', '../images/categories/202607b299c8bab3.png'),
(3, 'Adventure', 'Explore your world. Test yourself.', '../images/categories/892607b29f846de3.png'),
(4, 'Heritage', 'Tradition coupled with glory', '../images/categories/720607b2a2778405.png'),
(5, 'Culture', 'The soul of Bengal', '../images/categories/389607b2a6421e1e.png'),
(6, 'Kolkata', 'The city with a soul', '../images/categories/865607b2ad5a02a0.png'),
(7, 'Coastal', 'Unwind on the casuarina beaches', '../images/categories/63607b2b177a3e0.png'),
(8, 'Sunderbans', 'Delta. Mangroves. And if you are lucky - the tiger!', '../images/categories/10607b2b5090193.png'),
(11, 'The Mountains', 'Front row seats to the Himalayas', '../images/categories/531607b30df054b9.png');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` varchar(800) NOT NULL,
  `cover` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `category_id`, `name`, `description`, `cover`) VALUES
(1, 11, 'Kurseong', 'Kurseong is a hill station (and sub-divisional town) situated in Darjeeling District of West Bengal, India. Located at an altitude of 1458 meters (4864 ft), Kurseong is just 30 km from Darjeeling. It has a pleasant climate throughout the year and the winters are not as severe as Darjeeling\'s. The local name of Kurseong is ', '../images/destinations/923607b345abe32b.jpg'),
(2, 11, 'Darjeeling', 'Darjeeling conjures visions of snow peaks, serenity of vibrant green hills steeped in splendour, a land of breathtaking beauty crowned by the majestic Himalayas. Darjeeling is one of the most magnificent hill resorts in the world. This heavenly retreat is bathed in hues of every shade. Flaming red rhododendrons, sparkling white magnolias, miles of undulating hillsides covered with emerald green tea bushes, the exotic forests of silver fir - all under the blanket of a brilliant azure sky dappled with specks of clouds, compellingly confounds Darjeeling as the QUEEN OF HILL STATIONS. The crest of Kanchenjunga shining in the first dawn light truly supports the title.', '../images/destinations/371607b37206546b.jpg'),
(3, 11, 'Kalimpong', 'Kalimpong is a beautiful place of great attraction. this sleepy little town situated at an altitude of 1,200 mtrs, some 50 kms to the east of Darjeeling. It once used to be the hub of the trans-Himalayan trade between India and Tibet when merchants used to ferry commerce by mule caravan over the Jelepla pass on the Sikkim-Tibet border.', '../images/destinations/567607b378b60c9a.jpg'),
(4, 11, 'Rishop - Rimbik', 'Rishop is a tourist village in the Lava - Lolegaon Circuit in Kalimpong sub-division. This used to be an inaccessible village with few households and step farming dependent on monsoon rain till tourists discovered this hidden treasure of Eastern Himalaya. The main attraction of Rishop is the serene environment and great views of snow capped Himalayan mountain range from here. The surrounding destinations of Lava, Lolegaon, Pedong, Rishi, Aritar are all within close distance and can be visited as part of a day sightseeing tour. During the initial days, one had to trek about 5 km from Lava to reach here. ', '../images/destinations/754607b37d2931bf.jpg'),
(5, 11, 'Lava', 'Surrounded by virgin pine forests and often hidden in mists and clouds at an altitude of 2,350 meters, this small village lays few away from Kalimpong on the old trade route to Bhutan. It has a beautiful monastery of Bhutanese origin and a Nature Interpretation Centre. Popular for nature exploration and bird watching, it is also the starting point for treks into the Neora National Park, which abounds with floral and faunal wealth.', '../images/destinations/943607b382ca118c.jpg'),
(6, 11, 'Lolegaon', 'A small peaceful hamlet in the Kalimpong sub division of Darjeeling District, Lolegaon is nature\'s paradise on its own with beautiful landscape, comprising lush green forest and serene valleys. The peaks of Kanchenjunga rise majestically in the morning mist. Lolegaon is a one hour journey from Kalimpong and Lava through the serpentine forest road. Lolegaon offers small treks and trails. An Ideal destination for unwinding & relaxation. Lolegaon is a beautiful Lepcha village of scenic spledour.', '../images/destinations/766607b385c334a1.jpg'),
(7, 3, 'Sandakphu', 'Sandakphu is the highest peak in the state of West Bengal, India. It is the highest point of the Singalila Ridge in Darjeeling district on the West Bengal-Nepal border. The peak is located at the edge of the Singalila National Park and has a small village on the summit with a few hostels. Four of the five highest peaks in the world, Everest, Kangchenjunga, Lhotse and Makalu can be seen from its summit.', '../images/destinations/855607b3972117e8.jpg'),
(8, 2, 'Dooars', 'The Dooars or Duars are the foothills of the eastern Himalayas in North-East India around Bhutan. Duar means \'door\' and the region forms the gateway to Bhutan from India. There are 18 passages or gateways through which the Bhutanese people can communicate with the people living in the plains. This region is divided by the Sankosh River into the Eastern and the Western Dooars. ', '../images/destinations/570607b3a01afa55.jpg'),
(9, 2, 'Jaldapara', 'The river Torsha flows through this rain forest sanctuary and have an area of 141 Sq.Km and altitude of 61 m. Jaldapara, the vast grassland with patches of riverine forests was declared a sanctuary in 1941 for protection of the great variety flora and fauna, particularly the one-horned rhinoceros, an animal threatened with extinction. The Jaldapara Sanctuary covers 216 sq Km, is a mosaic of woods, grasslands, perennial streams, sandy river banks and extensive belts of tall grass. It contains a great diversity of flora and fauna of mixed deciduous forest, grasslands and river banks.', '../images/destinations/184607b3a47ec47c.jpg'),
(11, 2, 'Gorumara', 'Gorumara National Park is an important national park of North Bengal. It is situated just at the foothills of Eastern Himalaya in Terai region, on the flood plains in Murti, Raidak. Jaldhaka a Tributary of Brahmaputra flows just beside the National Park. Gorumara has mixed vegetation of forest & grassland. It is famous for its good population of One Horned Indian Rhino. Ministry of Environment and Forest has declared Gorumara as the best among the protected areas in India for the year 2009.', '../images/destinations/916607b3a8a7800d.jpg'),
(12, 4, 'Sutanuti Trails', 'The present Sovabazar Rajbari, a Grade I heritage building built by Raja Naba Krishna Deb is situated at 33R/1A, Raja Naba Krishna Street. Its architecture represents an ensemble of Hindu, Moorish and colonial traditions. Raja Naba Krishna Deb was Lord Clive’s ‘Munshi’ or tutor in Bengali, Persian, as well as the close confidant. During his lifetime this Rajbari played important role in the cultural and social life of Bengal.', '../images/destinations/727607b3b08dae1b.jpg'),
(13, 4, 'Colonial Heritage', 'The Colonial rule in India was started by the European countries like France, Portugal, Denmark and Dutch in 15th century, later British came to India and emerged as the dominant power in 18th century suppressing dominance of other European countries. This colonial rule continued till mid 20th century when India finally got independence in 1947. Though colonial rule ended but lots of buildings and other heritage was left behind by these countries which represents the colonial heritage in India.', '../images/destinations/173607b3b36e851f.jpg'),
(14, 4, 'Ramkrishna Vivekananda Trail', 'With intricate designing, this glorious temple, is reflecting a convergence of temple, church and mosque – a perfect integration of multi – religious and multi – cultural esteemed foundation.The temple enshrined with Sri Sri Ramakrishna is visited by scholars of many fields even from abroad for their profound admiration to this Hindu prophet.', '../images/destinations/216607b3b8055b57.jpg'),
(15, 5, 'Shantiniketan', 'Shantiniketan is a small town near Bolpur in the Birbhum district of West Bengal and about 212 kms north of Kolkata (formerly Calcutta).', '../images/destinations/473607c0b259d837.jpg'),
(16, 5, 'Siliguri', 'Located on the banks of the Mahananda River and at the Himalayan foothills, Siliguri is endowed with natural scenic beauty and attracts numerous tourists all year round. Views of the white snow-clad mountain peaks of the great Himalayan Ranges from Siliguri are not to be missed. The Kanchenjunga stadium and the Hong Kong market are famous tourist attractions. Jaldapara Wildlife Sanctuary, located nearby, is also a great place to visit for a safari.', '../images/destinations/76607c0b50d6910.jpg'),
(17, 6, 'Victoria Memorial', 'Today the Victoria Memorial Hall is a museum having an assortment of Victoria memorabilia, British Raj paintings and other displays. As night descends on Kolkata, the Victoria Memorial Hall is illuminated, giving it a fairy tale look. It is interesting to note that the Victoria Memorial was built without British government funds. The money required for the construction of the stately building, surrounded by beautiful gardens over 64 acres and costing more than 10 million was contributed by British Indian states and individuals who wanted favours with the British government. At the top of the Victoria Memorial is a sixteen foot tall bronze statue of victory, mounted on ball bearings. It rotates with wind.', '../images/destinations/224607c0e1572c13.jpg'),
(18, 6, 'Kalighat', 'Kalighat Kali Temple is a Hindu Temple dedicated to the Hindu goddess Kali. Kalighat was a Ghat (landing stage) sacred to Kali on the old course of the Hooghly River (Bhagirathi) in the city of Kolkata.', '../images/destinations/554607c0e36a1084.jpg'),
(19, 6, 'Kolkata - City of Joy', 'Kolkata- The Capital city, popularly known as The \'City of Joy\'. The city is dipped in history, art & culture, sports and socio-cultural activities. This was the erstwhile capital of the British Raj, and thus has architectural gems strewn all around. The city has its appeal for all visitors, with a medley of interest. From architectural wonders to swanky malls, from religious places to centres for performing arts, from historical colleges & universities to state-of-the-art stadiums.', '../images/destinations/280607c0e56ee514.jpg'),
(20, 7, 'Digha', 'Digha is the most popular sea beach in West Bengal. It is located 187 km south-west of Kolkata. Digha has a low gradient with shallow sand beach that extends up to 7 km in length and has gentle rolling waves. The scenic beauty of this place is charming and alluring. The beach is girdled with casuarinas plantations along the coast which enhances its beauty. Apart from beautification these trees also help in reducing erosion of the dunes. One can enjoy both the sunrise and sunset at the Digha sea beach. The sunset and sunrise reflecting the salty waters of the Bay of Bengal is something straight off an artist\'s canvas. ', '../images/destinations/327607c0f1681bcb.jpg'),
(21, 7, 'Mandarmani', 'Mandarmani is a seaside resort village in East Medinipur district and at the northern end of the Bay of Bengal. It is one of the large and fast developing seaside resort village of West Bengal. It is almost 180 km from Kolkata Airport on the Kolkata - Digha route. Red crabs crawling around the 13 km long beach is a special attraction of Mandarmani. It is argued to be the longest driveable (drive in) beach in India. Geomorphologic-ally, this area has relatively low waves than nearer tourist beach of Digha. However still this beach is deposition with formation of neo dunes in several areas specially around Dadanpatrabar.', '../images/destinations/688607c0ff2a5bc8.jpg'),
(22, 7, 'Tajpur', 'Tajpur is one of the most hidden beaches in India. Tajpur beach lies in the Purba Medinipur district of South Bengal, one of the southern districts of West Bengal. It lies on the Kolkata - Digha route and just 16 Km before Digha. Tajpur is one of Bengal\'s recently discovered tourist destination that lies close to ever-popular Mandarmoni and Shankarpur.', '../images/destinations/29607c10e7b6070.jpg'),
(23, 7, 'Shankarpur', 'Shankarpur is a virgin beach town located 14 km east of Digha. It is also a regular fishing harbour. The mornings are cool, when fishermen can be seen hauling their huge nets out of the sea. Here, the morning sun reflecting on the sea waves in the east and the local fishing boats on the coast offer excellent photographic opportunities. Shankarpur Beach is another coastal strip in the adjacent region to Mandarmoni. The beach is also referred as a twin beach of Digha.', '../images/destinations/423607c11628ad28.jpg'),
(24, 7, 'Bakkhali', 'Bakkhali is located on one of the many deltaic islands spread across southern Bengal. Most of the islands are part of the Sundarbans, barring a few at the fringes. Some of these are joined together with bridges over narrow creeks. This small island juts out into the vast expanse of the Bay of Bengal. The south facing crescent shaped beach of Bakkhali is one of the rare ones in the world that offer great views of both sunrise and sunset.', '../images/destinations/213607c11b58baae.jpg'),
(25, 8, 'Sunderban National Park', 'Bakkhali is located on one of the many deltaic islands spread across southern Bengal. Most of the islands are part of the Sundarbans, barring a few at the fringes. Some of these are joined together with bridges over narrow creeks. This small island juts out into the vast expanse of the Bay of Bengal. The south facing crescent shaped beach of Bakkhali is one of the rare ones in the world that offer great views of both sunrise and sunset.', '../images/destinations/985607c12b4a1647.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`category_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `category_constraint` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
