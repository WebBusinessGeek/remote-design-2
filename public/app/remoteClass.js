/**
 * Created by MacBookEr on 11/14/14.
 */

function RemoteClass(){

    this.comb = 'heyjdddkj';
    this.happy = [];

    this.dothis = function ()
    {
        console.log(this.happy + this.comb);
    }
}

RemoteClass.prototype.getInstance = function (arg)
{
    console.log(arg);
};

RemoteClass.prototype.setThis = function(arg)
{
    console.log(this.comb + arg);
};

RemoteClass.prototype.oversetThis = function()
{
    return this.setThis('heyaksks');
}

function SomeDirection(){
    return {
        template: '<div> this is a teas</div>'
    }
}

//SomeDirection.prototype.link = function(scope, element, attrs)
//{
//
//};