<div class="col col-lg-12 no-padding-left-right" ng-controller="QuestionsController">
    <div class="col col-lg-12" style="padding-top: 6px;padding-bottom: 6px;padding-right: 4px;padding-left: 4px;">
        <button class="btn btn-sm btn-primary" ng-click="goto('questions/add')" style="float: right;"><i class="fa fa-plus"></i> New Question</button>
    </div>
    <div class="col col-lg-12" style="padding: 4px">
        <table class="table table-responsive table-hover table-striped" >
            <thead>
                <tr>
                    <th style="width: 60px;">
                        No
                    </th>
                    <th style="width: 90px;">
                        Updated
                    </th>
                    <th>
                        Question
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="List in QuestionsList">
                    <th style="font-weight: bold;color: #999;border-right: 1px solid #ccc;">
                        {{List.question_id}}
                    </th>
                    <td style="color: #aaa;border-right: 1px solid #ccc;">
                        {{toTimeStamp(List.created_date) | hideIfEmptyDate:'dd-MMM-yy'}}
                    </td>
                    <td>
                        <strong style="float: right;">2</strong>
                        {{List.question_text}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>