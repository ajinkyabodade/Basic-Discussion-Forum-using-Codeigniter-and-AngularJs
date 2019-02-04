
<div name="ListView">
    <div class="row col-md-9  custyle">
        <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
                <tr ng-repeat="x in listview"> 
                    <td>{{x.fname}}</td>
                    <td>{{x.subject}}</td>
                    <td>{{x.date}}</td>
                    <td><a ng-href="#viewlistdetail/{{x.lid}}">View Details</a></td>
                    <td ng-if="x.uid!=uuid"></td>
                    <td ng-if="x.uid==uuid"><input  ng-hide="show" style="width:25%; " class="btn btn-success" value="Edit" ng-click="show=!show">

                   
                        <div ng-show="show">
                          <b> Subject:</b> <input type="text" name="x.subject" ng-model="x.subject"><br><br>
                        <b >Description: </b><input  type="textarea" name="x.descn" ng-model="x.descn"><br><br>
                        <a  style="margin-left:100px;" class="btn btn-success" ng-click="show=!show" >Cancle</a>
                        <input  style="width:25%; " class="btn btn-success" ng-click="editlistc(x.lid,x.subject,x.descn)"   value="Update">
                        
                        </div>
                    </td>
                </tr>
        </table>
    </div>
    
	<div class="col-md-3   pull-right" >
        <div style="margin-top:100px;" >
            <h2>Add Discussion Topic</h2><br>   
            <form>
                <label for="email_address">Subject</label>
                <div class="form-group">
                    <div class="form-line">
                        <input required="" type="text" name="subject" ng-model="subject" class="form-control" placeholder="Enter Subject">
                    </div>
                </div>
                <label for="password">Description</label>
                <div class="form-group">
                    <div class="    form-line">
                        <input required="" type="text" name="desc" ng-model="desc" class="form-control" placeholder="Enter Description">
                    </div>
                </div>
                <button   class="btn btn-primary btn-lg " ng-click ="addtopic()">Create Discussion Topic</button><br><br>
               <h1> {{message}}{{umessage}}</h1>
            </form>
        </div>
	</div>  
</div>