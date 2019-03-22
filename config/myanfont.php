<?php

return [

    'myanmar_tools' => [
        /*
         * If enabled, will use Myanmar-Tools.
         */
        'enabled' => false,

        /*
         * If over-predicting Zawgyi is bad (e.g., when conversion will take place automatically), set a high threshold like 0.95.
         * This threshold guarantees that fewer than 1% of Unicode strings will be wrongly flagged.
         */
        'zawgyi_score' => 0.95,

        /*
         * If under-predicting Zawgyi is bad (e.g., when a human gets to evaluate the result), set a low threshold like 0.05.
         * This threshold guarantees that fewer than 1% of Zawgyi strings will go undetected.
         */
        'unicode_score' => 0.05,
    ],

];
