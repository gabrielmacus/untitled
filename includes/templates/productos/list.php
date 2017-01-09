<table>
    <thead>
       <tr>
           <th>
               #
           </th>
           <th>
               Nombre
           </th>
           <th>
               Marca
           </th>
       </tr>
    </thead>
    <tbody>
    {{#products}}
    <tr>
        <td>{{id}}</td>
        <td>{{name}}</td>
        <td>{{brand}}</td>
    </tr>
    {{/products}}


    </tbody>
</table>