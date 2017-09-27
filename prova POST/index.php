<?php

require_once ("treater/requestTreater.php");
//TODO: implementar auto requirimento de classes  


//Externaliza o resultado do processamento da API em formato JSON, sempre.
echo((new RequestTreater())->start());
