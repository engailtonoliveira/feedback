

DELIMITER $$
--
-- Funções
--
CREATE FUNCTION `emotionBackgroundColor` (`emotion` VARCHAR(50) CHARSET utf8) RETURNS VARCHAR(50) CHARSET utf8 COLLATE utf8_estonian_ci NO SQL
BEGIN
	CASE emotion
        WHEN "sad" THEN RETURN "#e4352f80";
        WHEN "normal" THEN RETURN "#fae61380";
        WHEN "surprise" THEN RETURN "#EDC95180";
        WHEN "happy" THEN RETURN "#2fca3580";
        ELSE 
        	RETURN false;
    END CASE;
END$$

CREATE FUNCTION `emotionColor` (`emotion` VARCHAR(50) CHARSET utf8) RETURNS VARCHAR(50) CHARSET utf8 NO SQL
BEGIN
	CASE emotion
        WHEN "sad" THEN RETURN "#e4352f";
        WHEN "normal" THEN RETURN "#fae613";
        WHEN "surprise" THEN RETURN "#EDC951";
        WHEN "happy" THEN RETURN "#2fca35";
        ELSE 
        	RETURN false;
    END CASE;
END$$

CREATE FUNCTION `emotionToString` (`emotion` VARCHAR(50) CHARSET utf8) RETURNS VARCHAR(50) CHARSET utf8 NO SQL
BEGIN
	CASE emotion
        WHEN "sad" THEN RETURN "Sad";
        WHEN "normal" THEN RETURN "Normal";
        WHEN "surprise" THEN RETURN "Surprise";
        WHEN "happy" THEN RETURN "Happy";
        ELSE 
        	RETURN false;
    END CASE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emotion` enum('sad','normal','surprise','happy') CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `comments` varchar(523) COLLATE utf8_estonian_ci NOT NULL,
  `user_type` tinyint(1) NOT NULL,
  `token_app` varchar(1024) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `token_user` varchar(1024) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Extraindo dados da tabela `feedback`
--

INSERT INTO `feedback` (`id`, `emotion`, `comments`, `user_type`, `token_app`, `token_user`) VALUES
(1, 'normal', 'This is a alfa pluguin', 1, 'bvnçoaonba10922ry23tyir2jhsbvadkjvb', 'fvnçoaonba10922ry23tyir2jhsbvadkjvb'),

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
