<a class="btn btn-primary btn-xl pull-left" href="#">back</a>
<div class="container" style="padding-top:50px;">
  <div class="col-sm-12">
      <div class="panel panel-white post panel-shadow">
          <div class="post-heading">
              <div class="pull-left image">
                  <img src="https://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
              </div>
					
              <div class="pull-left meta" >
                  <div class="title h2">
                      <a href="#"><b>{{list.fname}}</b></a>
                      <h6 class="text-muted time">{{list.date}}</h6>
            		  <h6 class="title h4"><b>Subject: </b>{{list.subject}}</h6>
                      <h6 class="title h4"><b>Description: </b>{{list.descn}}</h6>
                 </div>
              </div>
         </div> 
            <br><br><br><br><br>
            <div class="post-footer">
                <div class="input-group"> <span class="input-group-addon">
    				<div class="controls">
        				<form class="form-horizontal" >
                        <input type="text" name="addcomnt" ng-model="addcomnt" class="form-control" required >
					</div>
                        <input  class="btn btn-success" ng-click="addcommentc()" value="Add Comment">
                       </form> 
                        {{cmessage}}
                    </div>
        		<li class="comment"ng-repeat="x in comments" >
                <ul class="comments-list" >
                    <li class="comment" >
                    <a class="pull-left" href="#">
                        <img class="avatar" src="https://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                    </a>                               
    				<div class="comment-body">
                        <div class="comment-heading">
                            <h4 class="user">{{x.fname}}</h4>
                            <h5 class="time">3 minutes ago</h5>
                        </div>
                        <p>{{x.comnt}}</p>
                    </div>
                    </li> 
                </ul>
                </li>
            </div>
        </div>
    </div>
</div>
</span>
</div>
</div>
</div>
</div>
</div>
