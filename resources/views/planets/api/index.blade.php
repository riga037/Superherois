@extends('plantilla')

@section('content')

<h1>CRUD PLANETES</h1>
<hr>
<div>
    <input type="text" id="planetNameInput">
    <button id="saveButton">Save</button>
</div>

<div id="errors" class="alert alert-danger"></div>

<br>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody id="taula">
    </tbody>
</table>

</body>
</html>

<script type="text/javascript">
    
    const planetNameinput = document.getElementById('planetNameInput');
    const saveButton = document.getElementById('saveButton');
    saveButton.addEventListener('click', savePlanet);
    
    const divErrors = document.getElementById("errors");
    divErrors.style.display = "none";
    
    const url = "http://127.0.0.1:8000/api/planets";
    
    function showErrors(errors) {
        
        divErrors.style.display = "block";
        divErrors.innerHTML = "";
        const ul = document.createElement("ul");
        
        for (const error of errors) {
            const li = document.createElement("li");
            li.textContent = error;
            ul.appendChild(li);
        }
        
        divErrors.appendChild(ul);
        
    }
    
    async function loadIntoTable(url) {
        
        try {
            
            const response = await fetch(url);
            const json = await response.json();
            const rows = json.data;
            
            for (const row of rows) {
                document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td>"+row.name+"</td><td><input type=button onclick='deletePlanet("+row.id+")' value='Delete'><input type=button onclick='updatePlanet("+row.id+")' value='Update'></td></tr>";
            }
            
        } catch(error) {
            
        }
        
    }
    
    async function savePlanet(event)  {
        
        console.log('Desar');
        
        var newPlanet = {
            'name' : planetNameInput.value
        }
        
        try {
            
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                },
                
                body: JSON.stringify(newPlanet)
            }
            
            )
            
            const data = await response.json();
            
            console.log(response);
            
            if(response.ok) {
                
                console.log(data.data);
                afegirFila(data.data);
                
            } else {
                
                showErrors(data.data);
                console.log("Error creant el planeta");
                
            }
            
        } catch (error) {
            //Errors de xarxa/connexió amb el servidor
            console.log('Error de xarxa/servidor');
            
        }
        
    }
    
    async function deletePlanet(id) {
        
        console.log(id)
        
        try {
            
            const response = await fetch(url+"/"+id, {method: "DELETE"});
            const json = await response.json();
            
            if(response.ok) {
                const row = document.getElementById(id);
                console.log(row);
                row.remove();
            } else {
                console.log("Error esborrant");
            }
            
            console.log(json);
            
        } catch(error) {
            
            console.log('Error');
            
        }
        
    }
    
    async function updatePlanet(id) {
        
        console.log(id)

        var rowName = document.getElementById(id).children[1];
        console.log(rowName);

        var updatedPlanet = {
            'name' : planetNameInput.value
        }
        
        try {
            
            const response = await fetch(url+"/"+id, {method: "PUT", headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                },body: JSON.stringify(updatedPlanet)});
            
            const data = await response.json();
            
            if(response.ok) {
                const row = document.getElementById(id);
                console.log(row);
               rowName.innerHTML = data.data.name;
    
            } else {
                console.log("Error actualitzant.");
                showErrors(data.data);
            }
            
            //console.log(json);
            
        } catch(error) {
            
            console.log('Error hhhh');
            
        }
        
    }
    
    function afegirFila(row) {
        
        document.getElementById("taula").innerHTML += "<tr id='"+row.id+"'><td>"+row.id+"</td><td>"+row.name+"</td><td><input type=button onclick='deletePlanet("+row.id+")' value='Delete'><input type=button onclick='updatePlanet("+row.id+")' value='Update'></td></tr>";
        
        
    }
    
    loadIntoTable(url);
    
</script>

@endsection