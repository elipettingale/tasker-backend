<?php

function mongo(): MongoDB\Database
{
    return app('db')->getMongoDB();
}
