<?php
        $problem=$_POST["problem"];
        $equation=$_POST["equation"];
        $template=$_POST["template"];
        // $problem = 'prblm';
        // $equation = 'eqn';
        // $template = 'tmplt';
        $xml =  new DOMDocument("1.0");
        $xml->formatOutput = true;
        for ($i = 1; $i <= 8; ++$i)
         {  

            $root = $xml->createElement("Question");
            $root = $xml->appendChild($root);

            $title = $xml->createElement('Number', "$i");
            $title = $root->appendChild($title);

            $title = $xml->createElement('Problem', "$problem");
            $title = $root->appendChild($title);

            $title = $xml->createElement('Equation', "$equation");
            $title = $root->appendChild($title);

            $title = $xml->createElement('Template', "$template");
            $title = $root->appendChild($title);
        }
        Header('Content-type: text/xml');
        $xml->save("b.xml");
        ?>