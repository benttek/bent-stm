<?php

SELECT title, startdate, id, user, SUBSTRING_INDEX(`startdate`,'T', 1) as sdate, SUBSTRING_INDEX(`startdate`,'T',-1) as stime FROM calendar WHERE `user` = '$usr' AND LEFT(`startdate`,10)='$today1'

?>