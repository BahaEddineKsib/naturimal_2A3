<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Animal</title>
    <link rel="stylesheet" href="Style/AjoutAnimalStyle.css">
</head>
<body>
    <form action="#">
        <table border=0 >

            <tr>
                <td colspan="2" id="TD1">
                    <h1>Enregistrez <br> Votre Animal De Compagnie</h1>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <select name="type" id="type-select">
                      <option value="type">type</option>
                        <option value="dog">Chien</option>
                        <option value="chat">Chat</option>
                        <option value="hamster">Hamster</option>
                        <option value="oiseau ">Oiseau</option>
                        <option value="spider">Spider</option>
                        <option value="poisson">Poisson </option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input placeholder="Nom" type="text" name="" id="" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input placeholder="Race (exemple: pitbull)" type="text" name="" id="" required>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input  type="date" name="" id="" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input placeholder="" type="file" name="" id="" required>
                </td>
            </tr>

            <tr>

                <td>
                    <input type="radio" name="sexe" id="sexe" required>Male
                </td>
                <td>
                        <input type="radio" name="sexe" id="sexe">Female
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <span>
                        Abandonner 
                    </span>
                    <input type="checkbox" name="" id="ABANDONNER">
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <textarea style="resize:none" placeholder="Details" id="" name="" rows="4" cols="50" fixed></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <input type="submit" value="AJOUTER">
                </td>
            </tr>
        
        </table>
    </form>
</body>
</html>