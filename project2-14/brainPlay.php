<!DOCTYPE html>
<!--
    Gregory Mann
    people.emich.edu/gmann1/COSC436/project2-14/brainPlay.php
-->
<html>

<head>
    <title>haynes at emunix.emich.edu </title>
    <!-- <base href="http://emunix.emich.edu/~haynes/public_html"> -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>p, h1, h2, h3, h4, h5, h6 {text-align: center}</style>
</head>

<body>
<div class="container">

    <?php
    include("header.html");
    ?>

    <h3>Haynes' assorted papers, mostly for students</h3>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <th>Topic</th>
                    <th>Date</th>
                    <th>Comment</th>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/MACUL2016">MACUL2016 - intro to Arduino</td>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/Recurrences/recurrences.html">Introduction to Recurrences</a></td>
                    <td>2007</td>
                    <td>short intro for COSC 311</td>
                </tr>
                <tr>
                    <td><a href="Papers/RedBlack/redBlack.doc">Red-Black tree insertion mechanics</a></td>
                    <td>11/22/08</td>
                    <td>White paper for students to understand red black trees</td>
                </tr>
                <tr>
                    <td><a href="Papers/SequentialDesign/SequentialCctDesign.doc">Sequential Cct Design Cookbook</a></td>
                    <td>11/12/08</td>
                    <td>Designing with states (flip flops) for COSC 321 students</td>
                </tr>
                <tr>
                    <td><a href="Papers/DepartmentTalks/sigcse2008.ppt">SIGCSE 2008 Report</a></td>
                    <td>3/17/08</td>
                    <td>COSC Department: part of a panel</td>
                </tr>
                <tr>
                    <td><a href="Papers/MASAL2008/MASAL2008.ppt">Computational Microswimmers</a></td>
                    <td>3/7/08</td>
                    <td>Michigan Academy Science Arts Letters</td>
                </tr>
                <tr>
                    <td><a href="Papers/DepartmentTalks/PythonRubyJavascript.ppt">Python, Ruby, JavaScript: Young and Interpreted</a></td>
                    <td>2/18/08</td>
                    <td>COSC Department</td>
                </tr>
                <tr>
                    <td><a href="Papers/Recursion/recursion.html">Recursion for beginning COSC students</a></td>
                    <td>01/07</td>
                    <td>A white paper on how to trace recursion</td>
                </tr>
                <tr>
                    <td><a href="Papers/ProbabilityDistributions/probabilityDistributions.html">Programming randomness for beginning COSC students</a></td>
                    <td>01/07</td>
                    <td>A white paper on elementary coding of fundamental distributions (uniform, Gaussian, Poisson)</td>
                </tr>
                <tr>
                    <td><a href="Papers/CircularQueue/cq.html">Implementing circular queue for microprocessors</a></td>
                    <td>01/07</td>
                    <td>A white paper on circular queues, size 2^k, using array (execution time matters)</td>
                </tr>
                <tr>
                    <td><a href="Papers/ExtendibleHashing/extendibleHashing.html">Extendible hashing explanation and example</a></td>
                    <td>04/07</td>
                    <td>A white paper on extendible hashing for my COSC students</td>
                </tr>
                <tr>
                    <td><a href="Papers/RunTimeAnalysis/runtimeAnalysis.html">Run time analysis</a></td>
                    <td>01/08</td>
                    <td>Alternate explanation and example: supplement for COSC 311</td>
                </tr>
                <tr>
                    <td><a href="Papers/ShellAndSftp/sftp.html">Elementary shell  sftp</a></td>
                    <td>01/08</td>
                    <td>White paper for beginning COSC students</td>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/FFT/NotesOnRecursiveFFT.pdf">Notes on Recursive FFT</a></td>
                    <td>FA 2010</td>
                    <td>COSC 511</td>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/TimedRepetition/TimedRepetition.html">Timed Repetition</a></td>
                    <td>10/11</td>
                    <td>for real-time</td>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/NumberRepresentation/NumberRepresentations.pdf">Number representations for beginning COSC students</a></td>
                    <td>WINTER 2011</td>
                    <td>decimal, binary, hex, Boolean</td>
                </tr>
                <tr>
                    <td><a href="Papers/MACUL2011/talk.html">MACUL 2011 talk</a> <a href="http://www.emunix.emich.edu/~haynes/Papers/MACUL2011/Applets/MACUL2011">Directory of source code</a></td>
                    <td>3/16/2011</td>
                    <td>Java Graphics Programming</td>
                </tr>
                <tr>
                    <td><a href="Papers/DigitalDiva/DigitalDiva2012/">Digital Diva 2012</a></td>
                    <td>2012</td>
                    <td>Invited workshop for middle school girls</td>
                </tr>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>

    <h3>Haynes' code fragments and examples</h3>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <table class="table table-striped">
                <tr>
                    <th>Topic</th>
                    <th>Language</th>
                    <th>Comment</th>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/AVL/NotesOnAVL.html">Notes on AVL</a> <br /><a href="http://emunix.emich.edu/~haynes/Papers/AVL/rotations.pdf">AVL Tree Rotations</a></td>
                    <td>Java</td>
                    <td>Pure code <br />Also has pictures</td>
                </tr>
                <tr>
                    <td><a href="http://emunix.emich.edu/~haynes/Papers/Stack/basicStackCode.txt">Stack code</a> (crude)</td>
                    <td>Java</td>
                    <td>correct code</td>
                </tr>
            </table>
        </div>
        <div class="col-md-4"></div>
    </div>

    <?php
    include("footer.html")
    ?>

</div>
</body>

</html>
