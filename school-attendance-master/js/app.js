/* STUDENTS IGNORE THIS FUNCTION
 * All this does is create an initial
 * attendance record if one is not found
 * within localStorage.
 */
$(function(){
     let initialNames = ['Slappy the Frog','Lilly the Lizard','Paulrus the Walrus','Gregory the Goat','Adam the Anaconda']

     function getRandom() {
         return (Math.random() >= 0.5);
     }

     let model = {
          init: function(){
                    if (!localStorage.attendance) {
                         console.log('Creating attendance records...');
                         let attendance = initialNames.map((name) => {
                         let nameObj = {name: name}
                         let days = []
                         for(let i=0 ; i < this.totalDays;i++){
                              days[i] = getRandom()
                         }
                         nameObj.days = days
                         return nameObj
                     })
                     localStorage.attendance = JSON.stringify(attendance);
                }
           },
           getData: function(){
                return JSON.parse(localStorage.attendance);
           },
           totalDays: 12,
           updateData: function(name, day,isChecked){
                var data = JSON.parse(localStorage.attendance);
                let newData  = data.map(person =>{
                     if(person.name === name){
                          person.days[day] = isChecked
                     }
                     return person
                })
                localStorage.attendance = JSON.stringify(newData);
           },
           idOfChange: '',


     }
     let control = {
          init: function(){
               model.init()
               view.init()
          },
          getAttendence: function(){
               return model.getData()
          },
          getAmountOfDays: function(){
               return model.totalDays
          },
          update: function(name,day,isChecked){
               model.updateData(name, day,isChecked);
               view.render()
          },
          setNameOfChange: function(id){
               model.idOfChange = id
          },
          getNameOfChange: function(){
               return model.idOfChange;
          },

     }

     let view = {
          init: function(){
               let attendance = control.getAttendence()
               let headerRow = $('#header-row')
               for(let i=0;i< control.getAmountOfDays();i++){
                    headerRow.append(`<th> ${i+1}</th>`)
               }
               headerRow.append('<th class="missed-col">Days Missed-col</th>')
               let tableBody = $('#table-body')
               for(var person of attendance){
                    tableBody.append('<tr class="student">')
                    tableBody.append(`<td class="name-col">${person.name}</td>`)
                    let total = 0;
                    let id = 0;
                    person.days.forEach(day =>{
                         total = day? total+1: total
                         let tempId = (person.name.replace( /\s/g, "-") + "="+id++)
                         tableBody.append(`<td  class="attend-col"><input id=${tempId} type="checkbox"`+(day? 'checked':'')+`></td>`)
                    })
                    tableBody.append(`<td id=${(person.name.replace( /\s/g, "-") + "Total")} class="missed-col">${total}</td>`)
               }
               $(":checkbox").change(function() {
                    control.setNameOfChange(this.id.substr(0,this.id.indexOf("=")))
                    var name = this.id.replace( /-/g, " ")
                    name = name.substr(0,name.indexOf("="))
                    var day = this.id.substr(this.id.indexOf("=") + 1)
                    control.update(name,day,this.checked)

               });

               view.render();
          },
          render: function(){
               let id = control.getNameOfChange()
               let attendance = control.getAttendence()
               let current = attendance.filter(person => {
                    return person.name === id.replace( /-/g, " ")
               }).map(person => {
                    let total = 0;
                    person.days.forEach(day =>{
                         total = day? total+1: total
                    })
                    return total
               })
               id = id + 'Total'
               $(`#${id}`).text(current)
          }
     }
     control.init()
});
