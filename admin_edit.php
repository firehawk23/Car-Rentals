<?php
$conn = new mysqli("localhost","root","","dbms_project");
if($conn->connect_error)
die("not connected:".$conn->connect_error);

$carnum=$_GET['carnum'];

$sql = "SELECT * from car where carnum='$carnum' ";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
    
if (isset($_POST['submit'])){
    
    $dist = mysqli_real_escape_string($conn, $_REQUEST['dist']);
    $rate = mysqli_real_escape_string($conn, $_REQUEST['rate']);
    $scap = mysqli_real_escape_string($conn, $_REQUEST['scap']);
   

    /*$sql = "INSERT into car values('$carname','$carnum','$dist','$rate','$scap','true',$city)";

    if ($conn->query($sql) === FALSE) 
         {
        echo "Error updating record: " . $conn->error;
    }
echo "created";
}*/


$sql = "UPDATE car set dist='$dist',rate='$rate',scap='$scap' where carnum='$carnum'";

    if ($conn->query($sql) === FALSE) 
         {
        echo "Error updating record: " . $conn->error;
    }
echo "<script> alert(\"Updated Successfully\");location.replace(\"adminhomepage.php\")</script>";
}


?>

<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.bg-image {
    /* The image used */
    background-image: url("data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMQDw8PEBASDw8PDQ8PDw8PEBAPDw8PFREWFhURFRUYHSggGBolHRUVITEhJSkrLi4vFx8zODMtNykvLisBCgoKDg0OFxAQGyslHR0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tKy0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALEBHAMBEQACEQEDEQH/xAAbAAADAQEBAQEAAAAAAAAAAAAAAQIDBAUGB//EAEEQAAEDAgMFBQUGAwYHAAAAAAEAAhEDEgQhUQUTMUFhFCKBkaEGUnGx8AcyQmLB0TOS4RVDY3JzgiNUk6KjwvH/xAAaAQEBAQEBAQEAAAAAAAAAAAAAAQIDBAUG/8QAMxEAAgIBAQYDBgYDAQEAAAAAAAECERIDBBMhMUFRFGGRBSJScaHwFTJCgbHhwdHxYiP/2gAMAwEAAhEDEQA/AE1i91nkxLDUslFhqWKLAQpYQWygpRbLEaJxLwHAS2Sojt6pkMUFiZDELVbFBaligtSxQiFLFGTmKWUTWpYo1a1VMy4lWK2TELEsYisSxQWpYocKjiElSkaykO4qYoZyC4pSGbC5KGQT0QWhKk4BCARCDgItSyUiCxWyUiCxLJiSWJYxILFbGJBYlkxBoWDZoAhSwEsFAKFKAQFAJYKASwUGpYodqWAhAEIAhANQoiEKQWqFJtSwaNCpksBLAQlgIVIEJYCEsChLAQgFCWAhWyBCWAhLAQlgISxQi1LFElqWQgtQEkICC1LIRCWAaFmzVFgJYosBLLRQapYooNSy0WAliigEstDhSxQQlihwlighLLiwtSxQQljEcJYSJLUstElqlihgJYosBWxRVqWSgtSxQi1LGIQljELVbJiK1LFBaligtSxQWpYoLUslBCWKCEsUK1LAi1LFEFqWKILVbJRJaliiC1LJQNasWbosNSy0UGpZaLAUsUUAlihgKWWioSxQQlihwlihwlihwlgISwEJYCEstBCWKEWKWKFaliig1WxRQCWKCEsUEJYoLUsUK1LIEK2KC1LAWqWKCFbFBCWAhSxQoVsUEJYoRCWSiSEsUQWq2KILUsjRNqWKE0LFm6LDUstFgKWKGGpYooNUstFQlihhqWKGGpYodqWKHalihwlighLFBCWWgtSxQQligtUsUOxLFAGq2KKtSxQWpYoLUsUK1LFBalkoVqWKC1LFBaligtSxQWpZKC1LFCtSy0FqWKEWpZKJLVbFElqWKILVbFEFqWSgAWLN0WAs2WigEsUUGpZaGGqNimUGqZFxZQaljFjDVbGLKtSxiwtTIlMdqZCgtSy0K1SxQWq2KC1SxQw1WxQ7VLGI7VbGIWqWKHaljELUsYitSxiFqqYoUK2SghLFBCWKCEsUKEsUEKWKCEsUEJYoIVsUSQpYoktVsUQWpZKJtSxRm1Ys2W0KWWiwEsUUFCjQDCFsoISxhAUEA1bICWASwCWASwOEsBCWBpZQSyAllBLAJYoUJZKCEsUEJYEligSxQJYCEsChLAQlgISxQkslCISxRJVsUSQliiCEsUZtC5tm6NGtUyLRUJkWioTIUO1MhiACWKLASxRQCZChwmQocJYocJYoISxQQlighLFBCWKCEsUOEsUEJYoLVbFBapYoISy0EJZKFCWKCFbFBCWKFClighWxQQlkoIUstChLFBCWKCEsUIhLFElqWKJLVUyURarYozC42dKLCliiwllopLLRQKyzcXRYI0WGmdU4voVZ0U3ldTW7voU2n0Uesu5Vs77Gm66BZ33ZmtwuqDdBXfSM7iA+z9VPFNdB4SPcDh+q3Hab6GHstcmIUCq9oSMrZmx9nOoWfFRNeEfcNwdR6rUdoUuSMvZmubJNMre9Rh6Ehbs6K72Pcm5mugrDoU3se5N1LsO3otZomDErZmgSxQJYoEsUEJYoUJYoISxQksUCWKCEsUKEsUEJYoISxQiEsUIhLFEFLFElLFGLR1XFyZ3UDVlOeYXOWtXQ6x0L6mm46rm9rS6HTwb7lbpYe19kbWx92AZ0WHtLfQ6rZYo0YFjet9Da04xNJK0muqI0+jGJV90z7w5K2nExLIYJW7gYqZQlYyj0NVIJVqxdcxXBMZDKBJeNVtRZyc4oN8FrBmd6h78LL0rNb5IW/U8PFk34Cv0RbNFch4h9iXVJXeMUjjKbkTK1ZzCUsUCWKEligSwEpYFKWKBLFAlihJYoaWMQhMi4hCmQwC1M0XAktTImBJb1TIYE29QrkMCBgnahfO8fp+Z7fDPuUMGdQsvb4dmXw77mjcKfeHqs+Og/0su6kupoMMfeHqp4tfAy4PuWMP8Am+aeJ/8ABcZd2Ps494+qniZdIDDzY+zN95yvidX4UZen92HZxq5aW0anwom68xbge87yXRa8+y9f6I9HzDs/5j5LXiH2+v8ARHoPuBw/5vQrS2h/D9UY3DAYf83oVfEeX8Dch2fqPIq7/wAhufMNx1HkU33kNyPcdR5FN95DcC3I19Cm+l2G5XcN0NVrevsTdLuG66q70m6DddU3pd0Pc9VN8NyG56qb5Dcj3XVN6XdBYdU3g3YW/BTNFwYwDoPJTNFwY7eg8kz8y4eQ7fyjyUz82VQXZBYPdHopvH3GC7BYNPkpvJdxu49g3TdE3shu4huW9VHqzLukPdDqpvp+Q3aHuxqVnfT8hu0FgUeq+xrELR08lN6y4rsTaNB5LO9fcuK7HhNrO1PmV68I9kcd5PuVvXan1UqPkMpd2WHO/N6p7vkW5+ZoHO6+qVElyKFQ9fMpSFyKDz18ylIWxh/x81aRLZQqdXealLyFsoPOrkpeReJQedXeRU93yHEd51PkU90vvDuP0Cnuj3gl30CpcS+8PvaLLnBdRUg73u+qbzT7ipB3vdPmm8h8SHHsGfun0/ZXeR7oU+xVp0P14JvF3GIoOhVzXcmIs9D9eKuS7jFgSdD9eKZImLJL1oDvP1KcBxE2oSJGY1GYUeKHFjvcnuj3gNRye6LkLfO0SkS5C3x0VxQthvTopSLbDenQpSFse+PVSolyYb49fJTGIykHaCmES5MRxJUwQzYu1FTdoubF2vopu0XNnktxLveK6YR7Eyl3NBiXe8VMI9hnLuW3EO94qYR7DKRYxLtUwj2LkyxiDqpihkyxiDqpgi5MrfnVMEMihX6piVSGK/VTEWUK/VTFFsoV+qmBU0PfdVMS2g33X0UwFoN919ExAbzqlFHf1+afsKC78yv7CkK4e8rb7EoJHvJcuxKQxGqmUhSGI19VMmXEeWvqmchiMAa+qmbJicOw3B1Bpn8dYcdKrx+i3qyal6fwZirR3Wj6KxvGaxQAD6KZsYoMvoqZMtBl9FMmKHPX1Uc32KFw1UyfYUFw1S5dgFwUuXYUEhMmKFA0Cm8kTEktGij1pefoMUFjdAs76XmXFdj5xrgvoOTMYI1a4arDlIqhE0EahTOXY1u13LEahTOXYbtFgDUeaZy7DdruOBqFc32Ju0MAaqZMYIrLVMpDFDuGqXIuMSg5uqlyGMRh7dQly7FxiF41CXIYoBVGoTiSkTUxTWxPAmCeQPKfrRVRkw8Uab4arNMvAW+GqtMcA3zVOI4B2hqVIXEO0tTGQtD7S1MZFtDGJamLFofaWpixaOXau0hRovqCCWjKdTwy5r1bHsr1tVRly6nm2raN1p2uZ8Hs/wBosRSqBrH3M3lTuODSzOq+eUjPqvtQ2HQ1dK5R49+p8rV2vV0tWovh2P0WniwWtJBEtBjSRwX53V0ZQm49j7WnqqcVLuPtLVjCRvJB2lqYSGSDtLevqmEi5IXaW9UxkLQdob1TGQtD7Q36lTGZLQ+0NUxkW0Z1cexuUy48G/iJ0AWloyfEjkh9qCzu2W0I4pvXyUwZckHam6HyTdyGSPl21eq99HGixWUoUWK6lFLFdKBYrqUKKFbqpQLFXqlAe96pQoe96qUWh73qgoe9QUG86oKHvEoUBfIg5g8QcwQnIV3POOxcP+Fhpf6FWtQ9Kbguu/1Orv58f5Oe4h0VfK1/AnbNI+5i8TTj/EZVH/ka5N93in+1fxQ3PaT+/nZ523sVXwdB1c4wPDSA1tTDU3F7jwbLC2PjC76C09WWLhXyb/zZw13PSjll9F/R5GzvavaNUMLcJSrB7HPaWEsJa1waTm7LMjzXfU2XZ4vjJr7+Rw09o15cVFP7+Z0VfbHF0yBV2ZUBcSG2uebiBJA7pnIE+Cwtk0Zfl1Pv1NvataP5tP79DM/aO1piphKtM6F4nyIC1+H3+WaJ49L80WbM+0fD86NYf9P9XLL9nz6SX1KvaEPhf0N2faHhebK4/wBjD8nKfh2r3X1/0X8Q0uz+/wBzLa3tXQxVBraTi1xqkGm+1tR2QiBJyMnMr3bDs70ZPLmzw7btEdWKx5I8Jxdh6rRiWnDvzfZUBaSxzy4ccxk7xhfQSWnHE8Dm9SWR9NV+0LCtJYG1n2Q29rGlroESCXcF8Oew6s5OVrj8/wDR9mG26UIqPHh99zF/2kYYf3VfypD/AN1n8O1OrX1/0b/ENLs/v9zCp9plEcKFU/Esb+60vZ0viXozL9oQ+F/QTvtAqFpczZ9ZzQJLi51oGpIZwTwUE6ep9P7HjJVag/v9joPtBtRwJZs0Myn/AIj4IHwLmrG62Vc9R/fqdN5tL5Q+/U8qt7X41lWjTruo4cV2U3sfTpb4tY/7riC/04r0R2XQkm48ea4vqv2PPPataDSnwunwXR/ufZU9kVz/ABdo1na7qnh6LT/2E+q+W9oh+nTX72/8n0ls0+s39F/gv+wKRMvfWqn/ABMTXc3+UODfRZ8VPokvkl/o14WPVt/uzfCbIo0SXUqdKm4iC5rWh5GhdxPBZltE5fmbZqOzxjySOk0vzDzWN4b3ZBonUeab1Ddsg0vqVd4hu2fPB69hwKD1KKiw9KKWHKUUsOClFNBGp8QpxLS7j8UFDBQlDuUFMV6tCg3ilFHvClAe9KtAN6UoBvSlAW+OqUDk2pg6eKpGlWFzJDhmQQ4cHA8jxWoScHaMamlHUjjIvZ2GZh6TaNEWsbMCSSSTJJJ4lJtzdssNNQWMeRu54Ja4gEtJLTzaSIJHgSs0aceoqwbUtDxcGvD2g5gOAIBjnxKJuPIjjlzPjtl+xRbVrGu+m+k7Jga0l38QOnMQzIRlPE+Pvntja93mfO09gak8uRe0vZPDuxVOnTBoMfRqPdY+Ye2pTHB08nxHUJDatRQbfEupsWm5qK4Wv9f7PN2n7LV8M4PoXV2NFxcIbUaQT+CZPLhK9OjtsZfm4M8mv7PnH8vFHDXGM2hWLntq1qsQ59TukAAZFzoHCMl3nrxSts82ls026in9/M9nDewwFHeV6pFQNJNKmWhoMmG3niYjlxXiltzcqiuB9CHs9KNyfHsersL2awxoYSo6k01LadWqT/xBUcaZlrg6REuBgaBefU2jUykr4f2ejR2XTcItrj/Rz+zfsk7D16r6r2VKZDRTDbriW1Gva53uwWDITPz1rbVnGkY0NiwnlLl0Prqzw4FrgHNcCHNdmCNCF40q5HvavmPfHVTFF4nl7U2Fh8TVZWrU7nsAH3iGuaDIDhzGa6w1ZwTjE46mzw1JKUkeo7EFccEd7Yt8dUwQtiNY6pghbEcQdUwQyZJxB1TdoZMntB1U3aGTLbuTyXD/AO6PbjpvsVuaRTLWRd3B9BjB0jzTe6y6EehDsJuEpkuAce6QD8SJ/VV62okm0Y3EH0KOz2+8U8TLsPDxJOzhyf6KraX8Jl7N5knAH3x5FbW0LsTwz7h2N44OHmVd/HqieHl3EcNU+PitLVgNzMXZ3+6m9h3JuZlbt3On5FTJPlI0tN/CVb+RL8zW78hWj3Y80t9ybpdixhp4Kbyi7gOxdVHrjw/mA2f+b0WXtK7E8P5h/Zx5OHlCni49ibjzGdnxxcFVtN8kVaCH2D8yj2jyLuEU3CN971WXrS7G91FEYhtKmLnvDR1/ZdNN6s3UY2c9Td6auXBHw+0MM12OOJa+aYxWGcGgPBdTYKN7uMSN24QRnPwX19PS1N0otcafX5nxNTV0t85p8LXflwv+D7KhtGhU4VAw6VO788ivnz2fWh+m/kfUhtWzz5Sr58Dm2V7N06LqlSlULjWAuJIcCb3ukfzx4BZ1Nrk/dkuRNLY4RblF8/7D2g2HVr4d1OmRcalEySWgBtVriZGfAHgmltcIytjaNmc4Yxfb+TP2c2BVw9J1J5DiKriHAuNzbWgOzzHA5K6u16cnaM7PsstOLTfU9M4B3Rc9/E77l9xHAv6LS1osm5kScI/Ra3kSbmRmaZGRyOh4rfPkYcWuZzVcbTaYNQT0l0eS6x0NSStI4S2jSi6ci2YhjuFRpP8AmA+azLSmuaZqOrpy4KSNHAASXADUkR5rCTbpI6OkrbMd6w5bxk6XNWt3NfpfoYzhyyXqWaJWLOuDINEq2MGeA3ajRxBGWZBaR8wvpPZn0Pkx21dbRszbNPu95wDotMHOeGQzXN7M+yO621KqbMcXt14LTRa59NmeIeaVSKbS61sn8MmRJ55LenskGnmc9X2jqJrB/O0b0faKk25wqfedc4lj8hAA4DQarE9juqX8HTS9otXk+b8zqf7Rsb94u4gTY4ZnhxXLwLZ3/FYrman2haMs/EsEeqn4ezX4tHsI+0gHAA/F4Cfhq7mH7Y7R+pLvaQkGG0weRLwQPBaXs2N8WzMvbEq4RV/M53e0lRgBO7fJaIGRzPHiuj9naT7nKPtbWXOn9/M66XtH77W/Fr49CuM/Zi/S/VHeHtf4o+jOpvtHS1cP5D+q4v2bPyPQvaug+af3+50U9uUD/egf5hHquT2HVXQ7R2/Z5fqr1NTtWgONWl/O391jwmr2Z0e06Pxr1RhW27hx+IOP5T+pyXWOwaz8vmeeftHQjyd/JHMfaanybI/1Grr+FyfOX0OD9rQ+F/Qyr+04/AGDq98nyBWoeyo/rfoc9T2s/wBEfX7/AMnn1tr1H/34APJjg0DPovXp7How5R9TxT27XnzlXy4f2cj3A5uqA9S+f1XpSS4JHmc3J8XYy7IEvyjKXZQiS7B6ku79RQPeHTvBKJb5jLQcyQepMqojd8x2DUeapKJNvC5ufDMIK6FMxIZk2rZdxDX2z5FZlCMuas6QnOKeLa+TKbj4zGIjrvT+6y9LT6xXoaWrq81J+rN6e2XgEDETOr2uPgSub2XRbvFHRbZrxVZP+SBtF3/MGeH8T+q3udP4V6GfFa3PN+odpJy3xg8t5x9Vd1BcaXoZ32rLhk/Vh2gkRviRpvDHzV3cOy9DO+1H+p+rMiGnMuaetwK2uHI5viOxuo8whA3Q1HmEAbkdPNAZUqEtHj15oGajeAQHPA0DnAQsuEW7aRtas0qUn6mNSm8mSXE6kuKqilyRHOUubZ843FxwZTPUsz+atebI9RLkk/2HUxc8WsByMhufqiVdTMpt9Ea0dpPaCGuDWuLLmBrQx9pkXAcYOqOKfMKbX/DBuIImDEiDEDJV0ZyZpTc95ylx/wAw5CefQLMtSEebOsdHVlHNLgYirrn4rTZiL48TWvQcxtNz2lrarS6mTwe0EtJHiCPBZWpFtpdDc9OUUm+pz3LWSOZ0HDO3O/gbrebq65v37boiZ4c4hY3kcsep2ejJQz6HNerkcTppYe+m97T/AA4L7jTb3SQAWgulxnkAY4rD1KlT6npWkpRco9Od/wDWYCqy0yDfcI4W2wZPxmFpydnOo4+ZrgqO9daHMabXOmo9tNsASRLjE6DmpLUUeJrS0XqOkYb4cIznTlrx+pVyMPgqGKo5+ERxVyMF0wSYDHzcGkWjIngDnzz8lMzWNnQMDUIkUyQRIuLGZXW8zlmD81N4u5taM3xSKwWANTMup0hLc6jwJBcASB0kn/aVHqNckRaTfNnXiNnUacB2JL3EcaNNj2AnlJeD6LK1NR/p+p13Omlxn6L/AIenhsDs8NF769V1k2hzGd4jk0DjPKViUtfyO0NHZ64ydnRs/DYMlgZQfLZN2KILHkAZOAkHiDELm5anHJ+htaeivy8/MraFbDNeZoseSZG6Acwk/hB5QAV0hddTE5K+S9Dso0sLAqOpty/CxjHnMcwVz1XJcn9TvoqDVtL0O6nQwRa2qWUw27JrqNFr3G2YAAz5cZ8F45T1MqV+rPXGGnXJeiHRwOBrGbbLbs3U6VJrjdwm2CR8lrfasf8ArC0NN9F6IC/B037s4d7ne+GNsIkC64GCM+KZasuN/UOGlF8voRtUYIt79GQMrqNtR4AE/eb3ogLUN4nabOOotCXP+DzP7KwNRpgYikbsiagaYgZBr+XXqvTGWt0pnmels76tep4lXZNO+xmIqE6Ow1UjjH3gYiefBdVPU7fU8stLT6T+jMMTsKuxrnQHtaGHukkulpMBozyiD8Qt590cnDzOB1GqL5p1AGTcSx7WiHBh4jk4gK5IzizF1Q5Eg5zBMwY459FchTIFcH/4rZC34oFxc8lxOZJcZJ1k81Lrgi3ZmawPCQPirZkBV/M7zSynCHLFmSrkKFwVsDuUA5CACZ/oYQo71DTk3zHcqZsVycC5OqFelEsd6tFsdNwJMz93LSZHHpEqA3pOYPvEuyOTcoMZFHRU0Ziqy7g4iOZzmU4C0dJ2hm42xd94ANaDBkZBOBcyDtElziZzI4mTwjMqppdA5Ng/GjkDwzkgyemWSZEyJOIIa0FhaSJknIg5ggRwjzlTIO0U/EEQ00yHXNOZI7scC2JzkGZ5JmVeZvT2oW3NLJJyAybYZ5i3MxlyU4MbxpmbdpOcXC2biTaJ90AfGIHklpFc5MintANexzmB7WvaXMLi29vNsjMSJzVfFEjLjxOlm1aAqZseaJYQ9sw+m9wObCHd4NMRJExnC51Nx6WdM435HOdrPDH03g3teDSM2bgz3xZHeJhoz4WreKu0YypOLOittCmG0mQ/eE34mrlBDoLQynMEBvemRN8RABOEpcXw8jpkopIzxm0aZcwUqbmtbTtLnvl1V0/xSODJ90EgalahaXHmYnJXwMxtIhpABBPHOWkRkC2M9c1ptPmYU5I2btokEFocTxngT1ynyIWcUaeqzF2PaXA2EC0juuAM8jwj0CqZHIVPaGYm6JztdBjmAdVvJGbYqW03AZF3E/iPN0qWitmlfaN1wFxbD7bokA/qeaWiKT6kvx7XDNs9xrMwJAEZAzlw5KcCuRhXqsLRAIIEEACDnIMyc848AnAlokOZa6S67K2AI45z9c+kG2jI6IYQbqhaZyAp3yNZuCy2+iKcQerRkoPVooXqUBh6tAd6uIsd6uAsW8TAWFyUhYXJQsLlKRAuSkADuh4a/wBExRbHf0Pn/RKQsQdplklIWVvT10VqIsN4VKQsRqZzCUhZbsS4xJLrWtaLjdDWiA0TyAyAUxiXJjq4p7jc5znOkG5xudkIGZz4AIoxGTbsDi3l19zr7r77u/fM3XcbpzmZTGPIOTuyaeLex17XOa8EkOabXCRBgjMZSjiqCkzAu+oKUiCDzPw+KvAthcgsb6hMSSYECZyGgSkLAP8ArMpSI2bnFuLGsJJYy6xpAIbcZdHxKmKsrk6oDiSQ0EyGi1oIHdEl0DQSSfEpghkVWxbn2l5utY2m3utyY0Q1vgFFBLkHNsK+Mc83P7zoaCbWjJrQ0DLoAPBFBLgg5WTicSaj3VHmXvcXOIa1oJJzMCAPBVQS4CUrdkGp0HDT+qriSxbzoPX90xJYnVOg9f3TEWIOTEWAcmIszlKBQTgBpaAJkBqZAcqWygqpMDlQgSgCVAEoAlAKUASgC5AEoAlAEoLCUFic5VEEXDVKKZl3WfJUo2Ea/JQCBz8eK10BZPX5LIIDuq10Bc9fksgprkZBqAFQJACAJQAgElgSvECCAAoBqgEAIBqMggoUYQAtEBCgOCyAQAgEUA1QJQgBCgiAnKrmBoCX8viqET9eqrKW1Qj5kO/X9VroDQLIMyqijHP4KE6FtUZClCsCgYlQCgGFUCUYEqAQH//Z");
    
    /* Add the blur effect */
    filter: blur(8px);
    -webkit-filter: blur(8px);
    
    /* Full height */
    height: 100%; 
    
    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  
  /* Position text in the middle of the page/image */
  .bg-text {
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
    color: white;
    font-weight: bold;
    border: 3px solid #f1f1f1;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    width: 80%;
    padding: 20px;
    text-align: center;
  }

  #un {
    border: 5px solid white; 
    -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    padding: 15px;
    background: rgb(255, 255, 255);
    margin: 0 0 10px 0;
    width:30%;
    height:30px;
    margin-left:1%;
}
#un1{
    width:30%;
    height:30px;
    margin-left:1%;
    margin-bottom:2%;
}

.example_a {
    color: #fff !important;
    text-transform: uppercase;
    text-decoration: none;
    background: #f80404;
    
    border-radius: 5px;
    display: inline-block;
    border: none;
    transition: all 0.4s ease 0s;
    height:30px;
    width:10%;
    }
    .example_a:hover {
        background: #434343;
        letter-spacing: 1px;
        -webkit-box-shadow: 0px 5px 40px -10px rgba(235, 46, 46, 0.925);
        -moz-box-shadow: 0px 5px 40px -10px rgba(248, 54, 54, 0.918);
        box-shadow: 5px 40px -10px rgba(248, 49, 49, 0.89);
        transition: all 0.4s ease 0s;
        }
    </style>
    </head>
   
<div class="bg-image"></div>

<div class="bg-text">
<?php echo '<a href="adminhomepage.php"><i class="fa fa-reply" style="font-size:25px;float:left;color:red;"></i></a><br/>';?>
<form action="" method="POST" class="form">
       
            <div>
            <p>Distance Travelled: </p>
            <input type="number" placeholder="Distance Travelled" name="dist" id="un" value="<?php echo $row['dist']?>" required="required" ><br>
            </div>
            <div>
            <p>Rate Per Day: </p>
            <input type="number" placeholder="Rate Per Day" name="rate" id="un" value="<?php echo $row['rate']?>" required="required"><br>
            </div>
            
            <div>
            <p>Seat Capacity: </p>
            <input type="number" min="2" max="9" placeholder="Seating Capacity" name="scap" id="un" value="<?php echo $row['scap']?>" required="required">  <br>
            </div>

            
            
            

                
            

            <br>
            <input type="submit" name="submit" class="example_a" value="Change">       
            </div>
            
                   
    </form>
</div>
</html>