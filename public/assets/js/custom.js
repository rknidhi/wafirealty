// const { isNumber } = require("lodash");

function EditPermission(id)
{
 if(id!='')
 {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'permission',
        data:{id:id,_token:CSRF_TOKEN},
        type:'post',
        success:function(suc)
        {
            // console.log(suc);
            $('#permission_modal').modal('show');
            $('#permission_table').html(suc);
        }
    })
 }
}

function deleteDepartment(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this department ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'department/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='department';
                }
            })
          }
    }
}

function deleteDesignation(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this designation ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'designation/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='designation';
                }
            })
          }
    }
}
function deleteEmployee(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this employee ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'employee/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='employee';
                }
            })
          }
    }
}
function deleteTicket(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this employee ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'ticket/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='ticket';
                }
            })
          }
    }
}
function deleteModule(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this module ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'module/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='module';
                }
            })
          }
    }
}


function deleteproductCategory(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this Product Category ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'productCategory/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='productCategory';
                }
            })
          }
    }
}
function deleteproductDetail(id)
{
    if(id!='')
    {
        if(!confirm("Do you want to delete this Product ?")) {
            return false;
          }
          else
          {
            $.ajax({
                url:'productDetail/delete?id='+id,
                type:'get',
                success:function(suc)
                {
                    alert(suc);
                    location.href='productDetail';
                }
            })
          }
    }
}
function getAllNewTickets(type)
{
    $.ajax({
        url: 'ticket/status?action=getTicket&sts='+type,
        type:'get',
        success:function(res)
        {
            $('#tickettable').html(res);
        }
    })
}
function getAllNewTicketsByUser(type)
{
    $.ajax({
        url: '/ticket/status?action=getTicketByUser&sts='+type,
        type:'get',
        success:function(res)
        {
            console.log(res);
            $('#tickettable').html(res);
        }
    });

}
function getUserPermission(id)
{
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/permission/userpermission',
        data:{id:id,_token:CSRF_TOKEN},
        type:'post',
        success:function(suc)
        {
            console.log(suc);
            $('#permission_modal').modal('show');
            $('#permissionstable').html(suc);
        }
    })
}

function getPlans()
{
    
    row = '';
    no = $('#totalplans').val();
    num = parseInt(no);
    row = "<div class='row col-12 col-lg-12 mt-3'><div class='col-2 col-lg-2'><select class='form-control select2' name='room_"+num+"'><option value='1'>1 BHK</option><option value='2'>2 BHK</option><option value='3'>3 BHK</option><option value='4'>4 BHK</option><option value='5'>5 BHK</option><option value='6'>Villa</option></select></div><div class='col-10 col-lg-10'><div class='col-4 col-lg-4'><input type='file' class='form-control' id='plan_"+num+"' name='plan_"+num+"'></div></div></div>";
    
    $('.planarea').append(row);
    $('#totalplans').val(num+1);
}
